<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Contracts\Auth\Guard;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Redirect;
use Illuminate\Support\Facades\Input;
use Request;
use Laravel\Socialite\Facades\Socialite;
use App\Social;
use Gravatar;
use App\Role;
use App\Profile;
use App\Vendor;
use App\Http\Requests\UserRegisterRequest;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $auth;
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->middleware('guest', ['except' => ['doLogout', 'activateAccount']]);
        $this->auth = $auth;
    }

    public function showLogin()
    {
        // show the form
        return view('auth.login');
    }

    public function showRegister()
    {
        // show the form
        $cities = \App\City::all();
        return view('auth.register', compact('cities'));
    }

    public function doLogin()
    {
// validate the info, create rules for the inputs
        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

// run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

// if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'active' => 1,
            );

            // attempt to do the login
            if (\Auth::attempt($userdata)) {
                $user = \Auth::user();
                if ($user->isVendor()) {
                    return redirect()->route('edit-company-profile')->withSuccess('Success Logged In!!');
                } else{
                    return redirect()->route('my-profile')->withSuccess('Success Logged In!!');
                }
            } else {
                // validation not successful, send back to form
                return Redirect::to('login')->withErrors(\Lang::get('auth.failed'));

            }
        }
    }

    public function doLogout()
    {
        \Auth::logout(); // log the user out of our application
        return Redirect::to('login'); // redirect the user to the login screen
    }

    public function activateAccount($code, User $user)
    {
        if ($user->accountIsActive($code)) {
            return redirect('login')->withSuccess(\Lang::get('auth.successActivated'));
        }
        \Session::flash('message', \Lang::get('auth.unsuccessful'));
        return redirect('login')->withError();

    }

    public function getSocialRedirect($provider)
    {
        $providerKey = \Config::get('services.' . $provider);
        if (empty($providerKey))
            return redirect('login')->with('error', 'No such provider');

        return Socialite::driver($provider)->redirect();
    }

    public function getSocialHandle($provider)
    {
        if(Input::get('error')=='access_denied'){
            return redirect('login')->with('error','Sellnepal needs Permission to process.');
        }
        $ProviderUser = Socialite::driver($provider)->user();
        $user = $this->findOrCreateUser($ProviderUser, $provider);
        if ($user) {
            $this->auth->login($user, true);
            if ($user->isVendor()) {
                return redirect()->route('edit-company-profile')->withSuccess('Success Logged In!!');
            } else{
                return redirect()->route('my-profile')->withSuccess('Success Logged In!!');
            }
        } else {
            return redirect('login')->withErrors('Error in your Social Account');
        }
    }

    public function findOrCreateUser($ProviderUser, $provider)
    {
        if($ProviderUser->email){
            $authUser = User::where('email', $ProviderUser->email)->first();
        }else{
            $email = $ProviderUser->id.'@sellnepal.com';
            $authUser = User::where('email', $email)->first();
        }
        if (!empty($authUser)) {
            $social_user_id = Social::where('social_id', '=', $authUser->id)->where('provider', '=', $provider)->first();
            if (!empty($social_user_id)) {
                return $authUser;
            } else {
                // GET SOCIAL MEDIA LOGIN DATA
                $social_data = new Social;
                $social_data->social_id = $ProviderUser->id;
                $social_data->provider = $provider;
                $authUser->social()->save($social_data);
                return $authUser;
            }
        } else {
            $social_user_id = Social::where('social_id', '=', $ProviderUser->id)->where('provider', '=', $provider)->first();
            if (empty($social_user_id)) {
                $authUser = $this->AccountCreate($ProviderUser, $provider);
                $social_data = new Social;
                $social_data->social_id = $ProviderUser->id;
                $social_data->provider = $provider;
                $authUser->social()->save($social_data);
                return $authUser;
            } else {
                $authUser = User::findorFail($social_user_id);
                return $authUser;
            }

        }
    }

    public function RegisterUser(UserRegisterRequest $request)
    {
        $activation_code = str_random(60) . $request->input('email');
        $user = new User;
        $user->username = $request->input('username');
        $user->firstname = $request->input('first_name');
        $user->lastname = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        // GET GRAVATAR
        $user->gravatar = '';

        // GET ACTIVATION CODE
        $user->activation_code = $activation_code;

        // SAVE THE USER
        if ($user->save()) {
            $role = $request->input('account_type');
            $profile = new Profile;
            if ($role == 1) {
                $user_role = Role::whereName('vendor')->first();
                $profile->phone = $request->input('phone');
                $profile->company_name = $request->input('companyname');
                $profile->street = $request->input('street');
                $profile->area = $request->input('area');
                $profile->city = $request->input('city');
                $profile->show_phone = 1;
            } else {
                $user_role = Role::whereName('seller')->first();
                $profile = new Profile;
                $profile->phone = $request->input('phone');
                $profile->street = $request->input('street');
                $profile->area = $request->input('area');
                $profile->city = $request->input('city');
                $profile->show_phone = 1;
            }
            $user->profile()->save($profile);
            $user->assignRole($user_role);
            $this->sendEmail($user);
            return redirect('login')
                ->withSuccess('Please check your account to verify your email.');

        } else {
            \Session::flash('message', \Lang::get('notCreated'));
            return redirect()->back()->withInput();
        }

    }

    public function AccountCreate($user, $provider = null)
    {
        //$providerUser->
        $new_user = new User;
        if($user->email){
            $new_user->email = $user->email;
        }else{
            $new_user->email = $user->id.'@sellnepal.com';
        }

        $name = explode(' ', $user->name);
        $new_user->username = $user->id;
        $new_user->firstname = $name[0];
        // CHECK FOR LAST NAME
        if (isset($name[1])) {
            $new_user->lastname = $name[1];
        }


        // For Account Activation
        $active = is_null($provider) ? 0 : 1;
        $new_user->active = $active;
        $the_activation_code = str_random(60) . $user->email;
        $new_user->activation_code = $the_activation_code;

        // GET GRAVATAR
        $new_user->gravatar = '';

        // SAVE THE USER
        $new_user->save();

        $role = \App\Role::whereName('buyer')->first();
        $new_user->assignRole($role);

        $profile = new Profile;
        $new_user->Profile()->save($profile);

        return $new_user;
    }

    public function sendEmail(User $user)
    {
        $data = array(
            'name' => $user->name,
            'code' => $user->activation_code,
        );

        \Mail::queue('emails.activateAccount', $data, function ($message) use ($user) {
            $message->subject(\Lang::get('auth.pleaseActivate'));
            $message->to($user->email);
        });
    }

    public function resendEmail()
    {
        $user = \Auth::user();
        $username = $user->name;
        $userEmail = $user->email;
        $user->resent = $user->resent + 1;
        $user->save();
        $this->sendEmail($user);
        return view('auth.activateAccount')
            ->with('email', $userEmail)
            ->with('username', $username);
    }


}
