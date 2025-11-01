<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login dan memiliki role 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            // Jika admin, lanjutkan ke halaman yang diminta
            return $next($request);
        }

        // Jika bukan admin, tampilkan error 403 atau arahkan ke halaman lain
        abort(403, 'Akses ditolak: Anda bukan admin.');
        // atau redirect:
        // return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
