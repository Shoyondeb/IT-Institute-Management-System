<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Check if user is admin
        if (auth()->user()->isAdmin()) {
            // If trying to access admin routes, allow it
            return $next($request);
        }

        // If user is not admin and trying to access admin routes, redirect
        if ($request->is('admin*')) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
        }
        return $next($request);
    }
}
