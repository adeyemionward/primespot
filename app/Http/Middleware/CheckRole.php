<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $user_type)
    {
        if (Auth::check()) {
            // Check if the user has the specified role
            if (Auth::user()->user_type === $user_type) {
                return $next($request);
            }
        }
        // If the user is not logged in or doesn't have the correct role, redirect them to homepage
        return redirect('/');
    }
}
