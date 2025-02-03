<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $roles = array_map('strtolower', explode(',', Auth::user()->role));

            if (in_array('super_admin', $roles) || in_array('admin', $roles)) {
                return redirect('/admins');
            }

            if (in_array('student', $roles)) {
                return redirect('/student');
            }

            return redirect('/login')->withErrors('Unauthorized access.');
        }

        return $next($request);
    }
}
