<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Ganti 'admin' dengan level atau role yang sesuai dalam aplikasi Anda
        if (Auth::check() && Auth::user()->level === '1') {
            return $next($request);
        }

        // Redirect atau tampilkan error jika bukan admin
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
