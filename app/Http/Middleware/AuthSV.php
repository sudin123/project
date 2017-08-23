<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AuthSV
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        } else if($request->user()->hasRole('seller') || $request->user()->hasRole('vendor') || $request->user()->hasRole('administrator')) {
            return $next($request);
        }
        return redirect()->route('my-profile')->with('error','Please choose account type to Proceed.'); //Or redirect() or whatever you want

    }
}
