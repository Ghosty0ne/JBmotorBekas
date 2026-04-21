<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBlockedUser
{
    


    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_blocked) {
            Auth::logout();
            return redirect('/login')->with('error', 'Akun Anda telah diblokir. Silakan hubungi admin untuk informasi lebih lanjut.');
        }

        return $next($request);
    }
}
