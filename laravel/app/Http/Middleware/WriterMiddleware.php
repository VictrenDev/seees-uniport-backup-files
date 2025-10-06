<?php

namespace App\Http\Middleware;

use auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WriterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated and has the 'writer' role
        if (auth()->check() && auth()->user()->role === 'writer') {
            return $next($request);
        }

        // Redirect or handle unauthorized access as needed
        return redirect()->route('home')->with('error', 'Unauthorized access');
    }
}
