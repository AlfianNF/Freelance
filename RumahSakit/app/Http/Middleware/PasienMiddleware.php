<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasienMiddleware
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

         // Periksa apakah pengguna ditemukan dan memiliki tingkatan sebagai pasien
         if ($user && $user->tingkatan_user === 'pasien') {
             return $next($request);
         }

         // Jika pengguna tidak ditemukan atau tidak memiliki tingkatan sebagai pasien, kembalikan respon larangan
         return redirect()->route('login.pasien')->with('failed', 'Anda bukan pasien');
        }
}
