<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has one of the allowed roles
        $allowedRoles = ['admin', 'writer', 'pres', 'exco', 'dev'];

        if (auth()->check() && in_array(auth()->user()->role, $allowedRoles)) {
            return $next($request);
        }

        // Redirect or handle unauthorized access as needed
        return redirect()->route('home')->with('error', 'Unauthorized access');

    }
}
