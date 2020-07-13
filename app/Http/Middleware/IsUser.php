<?php

namespace App\Http\Middleware;

use Closure;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('user')) {

            if (session('user')->role_name == 'user' || session('user')->role_name == 'journalist') {
                return $next($request);

            } else {
                return redirect('/')->with('error', 'You cannot access this page.');
            }
        }
        else{
            return redirect('/')->with('error', 'Log in to access this page.');
        }


    }
}
