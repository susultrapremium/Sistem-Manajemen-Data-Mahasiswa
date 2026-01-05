<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // ganti route login
        }

        // Cek role: 1 = admin, 0 = mahasiswa
        if ($role == 'admin' && Auth::user()->role != 1) {
            abort(403, 'Akses ditolak.');
        }

        if ($role == 'mahasiswa' && Auth::user()->role != 0) {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
