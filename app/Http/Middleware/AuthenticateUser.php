<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            // Redirect to login page with an error message
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        // If authenticated, proceed with the request
        return $next($request);
    }
}
