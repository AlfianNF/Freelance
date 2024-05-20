<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DokterDashboardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa jika pengguna saat ini ada dan memiliki tingkatan yang sesuai
        if (Auth::check() && Auth::user()->tingkatan_user === "dokter") {
            return $next($request);
        }

        // Jika bukan pengguna yang diizinkan, kembalikan respons tidak diizinkan
        return redirect()->route('login.dokter')->with('failed', 'Silahkan login terlebih dahulu');
    }
}
