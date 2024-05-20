<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PasienDashboardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in
        if (Auth::guest()) {
            // Redirect to login page with message
            return redirect('/login/pasien')->with('message', 'Silakan login terlebih dahulu');
        }

        // Check if user has the required role
        if (Auth::check() && Auth::user()->tingkatan_user !== "pasien") {
            // Return unauthorized response
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Authorized user, proceed with the next middleware or route
        return $next($request);
        }
}
