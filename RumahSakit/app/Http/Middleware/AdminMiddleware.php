<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
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

            // Periksa apakah pengguna ditemukan dan memiliki tingkatan sebagai admin
            if ($user && $user->tingkatan_user === 'admin') {
                return $next($request);
            }

            // Jika pengguna tidak ditemukan atau tidak memiliki tingkatan sebagai admin, kembalikan respon larangan
            return response()->json(['message' => 'Anda bukan admin'], 403);
    }
    
}
