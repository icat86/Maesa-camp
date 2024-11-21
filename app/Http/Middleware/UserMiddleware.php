<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->usertype === 'user') {
            return $next($request);
        }

        return redirect('/admin/dashboard');  // Redirect to admin dashboard if not user
    }
}

