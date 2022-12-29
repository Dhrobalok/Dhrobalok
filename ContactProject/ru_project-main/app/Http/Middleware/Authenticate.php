<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use Illuminate\Http\Request;

// use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Session::get('emailname'))
        {
             return response()->view('auth.login');
        }
        return $next($request);


    }
}
