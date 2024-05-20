<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DokterMiddleware
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

        
        // Cari pengguna berdasarkan us
        $user = User::where('username', $username)->first();

        // Periksa apakah pengguna ditemukan dan memiliki tingkatan sebagai dokter
        if ($user && $user->tingkatan_user === 'dokter') {
            return $next($request);
        }

        // Jika pengguna tidak ditemukan atau tidak memiliki tingkatan sebagai dokter, kembalikan respon larangan
        return redirect()->route('login.dokter')->with('failed', 'Silahkan login terlebih dahulu');
    }
}
