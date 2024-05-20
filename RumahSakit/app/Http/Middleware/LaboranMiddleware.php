<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaboranMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Tangkap username dari request
        $username = $request->input('username');

        // Cari pengguna berdasarkan username
        $user = User::where('username', $username)->first();

        // Periksa apakah pengguna ditemukan dan memiliki tingkatan sebagai laboran
        if ($user && $user->tingkatan_user === 'laboran') {
            return $next($request);
        }

        // Jika pengguna tidak ditemukan atau tidak memiliki tingkatan sebagai laboran, kembalikan respon larangan
        return response()->json(['message' => 'Anda bukan laboran'], 403);
    }
}
