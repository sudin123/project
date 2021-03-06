<?php

namespace App\Http\Middleware;

use Closure;
Use Illuminate\Contracts\Auth\Guard;

class AuthVendor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(Guard $auth) {
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
        } else if(! $request->user()->hasRole('vendor')) {
            return abort(404); //Or redirect() or whatever you want
        }
        return $next($request);
    }
}
