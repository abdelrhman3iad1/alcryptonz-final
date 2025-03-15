<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request);
        }
        elseif(Auth::check()){
            return redirect()->back();
        }else{
            // edit the route to dashboard login page
            return redirect()->route('get.dashboard.login')->with('error', 'You are not authorized to access this page.');
        }

    }
}
