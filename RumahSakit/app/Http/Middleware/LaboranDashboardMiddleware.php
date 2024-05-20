<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LaboranDashboardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa jika pengguna saat ini ada dan memiliki tingkatan yang sesuai
        if (Auth::check() && Auth::user()->tingkatan_user === "laboran") {
            return $next($request);
        }

        // Jika bukan pengguna yang diizinkan, kembalikan respons tidak diizinkan
        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
