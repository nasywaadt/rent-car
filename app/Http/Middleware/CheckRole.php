<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Cek apakah pengguna sudah login dan perannya sesuai dengan yang dibutuhkan
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Jika tidak sesuai peran, arahkan ke halaman 403 atau halaman lainnya
        abort(403, 'Akses ditolak');
    }
}
