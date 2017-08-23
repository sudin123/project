<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CompanyProfileRequest;
use App\Vendor;
use Illuminate\Support\Str;
use Image;
use Response;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['showCompanyProfile', 'showCompanyUsers', 'searchDealers']]);
    }

    public function MemberArea()
    {
        $user = \Auth::user();
        $posts_num = $user->AuthorAds()->count();
        $views_num = $user->AuthorAds()->sum('view_count');
        return view('auth.items.info', compact('posts_num', 'views_num', 'user'));
    }

    public function changePassword()
    {
        $user = \Auth::user();
        return view('auth.changepassword', compact('user'));
    }

    public function updatePassword(PasswordRequest $request)
    {
        $user = \Auth::user();
        if($user->password == null || $user->password == ''){
            $user->password = Hash::make(Input::get('password'));
            if ($user->save()) {
                return Redirect::route('change-password')->with('status', 'Password updated!');
            }else{
                return Redirect::route('change-password')->withErrors('There was some error. Please contact Developers!!');
            }
        }else{
            $existingpassword = Input::get('oldpassword');
            if (Hash::check($existingpassword, \Auth::user()->password)) {
                $user->password = Hash::make(Input::get('password'));
                if ($user->save()) {
                    return Redirect::route('change-password')->with('status', 'Password updated!');
                }
            } else {
                return Redirect::route('change-password')->withErrors('Please check your existing Password!!');
            }
        }

    }

    public function userAds()
    {
        $user = \Auth::user();
        if ($user->hasRole('administrator')) {
            $posts = Post::latest()->paginate(10);
        }else{
            $posts = $user->AuthorAds()->latest()->paginate(10);
        }

        return view('auth.my-ads', compact('posts'));
    }


    public function showProfile()
    {
        $user = \Auth::user();
        $cities = \App\City::all();
        return view('auth.profile', compact('user', 'access', 'cities'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $user = User::findOrfail(\Auth::user()->id);
        $user->firstname = Input::get('firstname');
        $user->lastname = Input::get('lastname');
        $user->save();
        $profile_input = Input::only('phone', 'telephone', 'street', 'area', 'city', 'show_phone');
        if ($user->profile == null) {
            $profile = new Profile;
            $profile->fill($profile_input);
            $user->profile()->save($profile);
        } else {
            $user->profile->fill($profile_input)->save();
        }
        if ($user->hasRole('buyer')) {
            $selectedRole = Input::get('selectrole');
            if ($selectedRole == 1 || $selectedRole == 2) {
                $removeRole = \App\Role::whereName('buyer')->first();
                if ($selectedRole == 2) {
                    $role = \App\Role::whereName('vendor')->first();
                    $user->assignRole($role);
                    $user->removeRole($removeRole);
                    return redirect()->route('edit-company-profile')->with('status', 'Profile updated!');
                } else {
                    $role = \App\Role::whereName('seller')->first();
                    $user->assignRole($role);
                    $user->removeRole($removeRole);
                    return redirect()->route('my-profile')->with('status', 'Profile updated!');
                }
            } else {
                return redirect()->route('my-profile')->with('status', 'Profile updated!');
            }
        }
        return redirect()->route('my-profile')->with('status', 'Profile updated!');
    }

    public function showCompanyUsers()
    {
        $users = User::isRole('vendor')->select('id', 'username', 'firstname', 'lastname', 'email')->paginate(10);
        $search = '';
        return view('company-profiles', compact('users', 'search'));
    }

    public function showCompanyProfile($username)
    {
        $user = User::whereUsername($username)->whereActive(true)->first();
        $search = '';
        if ($user->isVendor()) {
            $posts = Post::whereUserId($user->id)->latest()->paginate(9);
            return view('company-profile', compact('user', 'posts', 'search'));
        } else {
            $posts = Post::whereUserId($user->id)->latest()->paginate(9);
            return view('user-profile', compact('user', 'posts', 'search'));
        }
        return Response::view('errors.404');
    }

    public function showCompanyEditProfile()
    {
        $user = \Auth::user();
        $cities = \App\City::all();
        if ($user->isVendor()) {
            return view('auth.vendor', compact('user', 'cities'));
        }
        return Response::view('errors.404');
    }

    public function updateCompanyProfile(CompanyProfileRequest $request)
    {
        $user = \Auth::user();
        if ($user->isVendor()) {
            $fileName = $user->profile->company_logo;
            if (Input::hasFile('companylogo')) {
                if ($fileName != '') {
                    $path = 'uploads/company-logo/';
                    \File::delete($path . $fileName);
                }
                $file = Input::file('companylogo');
                $originalpath = 'uploads/company-logo/original';
                $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                $fileName = str_random(6) . "_" . $name . '.' . $file->getClientOriginalExtension();
                $file->move($originalpath,$fileName);
                $img = 'uploads/company-logo/original/'. $fileName;
                $path = 'uploads/company-logo/'. $fileName;
                Image::make($img)->save($path);
                $path = 'uploads/company-logo/original/';
                \File::delete($path . $fileName);
            }
            $profile = $user->profile;
            $profile->company_name = $request->input('companyname');
            $profile->company_logo = $fileName;
            $profile->about = $request->input('aboutcompany');
            $profile->phone = $request->input('companyphone');
            $profile->telephone = $request->input('companyphone2');
            $profile->fax = $request->input('companyfax');
            $profile->website = $request->input('companywebsite');
            $profile->street = $request->input('street');
            $profile->area = $request->input('area');
            $profile->city = $request->input('city');
            $profile->save();
            return redirect()->route('edit-company-profile')->with('status', 'Profile updated!');
        }
        return redirect()->route('edit-company-profile')->with('error', 'There was something error with your input. Please Try again');
    }

    public function searchDealers()
    {
        $search = strtolower(Input::get('d'));
        $dealers = User::where(function ($q) use ($search) {
            $q->where('email', 'like', '%' . str_replace(' ', '', $search) . '%')->orWhere('username', 'like', "%{$search}%")->orWhereHas('profile', function ($q) use ($search) {
                $q->where(function ($q) use ($search) {
                    $q->where('company_name', 'like', "%{$search}%")->orWhere('about', 'like', "%{$search}%");
                });
            });
        })->isRole('vendor')->paginate(10);
        return view('companies-search', compact('dealers', 'search'));
    }

    public function selectBusinessAccount()
    {
        $user = \Auth::user();
        if ($user->hasRole('seller') || $user->hasRole('vendor')) {
            return Response::view('errors.404');
        }
        $role = \App\Role::whereName('vendor')->first();
        $user->assignRole($role);
        return redirect()->route('edit-company-profile');
    }

    public function selectPersonalAccount()
    {
        $user = \Auth::user();
        if ($user->hasRole('seller') || $user->hasRole('vendor')) {
            return Response::view('errors.404');
        }
        $role = \App\Role::whereName('seller')->first();
        $user->assignRole($role);
        return redirect()->route('my-profile');
    }
}
