<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (Auth::check()) {
            // Normalize the roles to lowercase and split roles if they are comma-separated
            $userRoles = array_map('strtolower', explode(',', Auth::user()->role));
            $allowedRoles = array_map('strtolower', $roles);

            // Check if any user role matches the allowed roles
            if (array_intersect($userRoles, $allowedRoles)) {
                return $next($request);
            }
        }

        return redirect('/login')->withErrors('Unauthorized access.');
    }
}
