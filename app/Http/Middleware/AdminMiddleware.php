<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
   
    public function handle($request, Closure $next)
    {
        // Lakukan pengecekan peran pengguna di sini
        if ($request->user() && $request->user()->role !== 'Admin') {
            $request->session()->flash('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            // Redirect ke halaman lain atau tampilkan pesan 'Unauthorized'
            return redirect('/unauthorized');
        }
       
        return $next($request);
    }
}
