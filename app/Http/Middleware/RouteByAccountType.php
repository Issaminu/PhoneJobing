<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteByAccountType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //If user role is manager
        if (Auth::user()->type === 'manager') {
            return response()->view('manager-dashboard');
        }

        //If user role is teleoperateur
        if (Auth::user()->type === 'teleoperateur') {
            return response()->view('teleoperateur-dashboard');
        }

        //If user role is commercial
        if (Auth::user()->type === 'commercial') {

            return response()->view('commercial-dashboard');
        }
        //default redirect
        return $next($request);
    }
}
