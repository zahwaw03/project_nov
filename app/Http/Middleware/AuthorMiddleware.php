<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Lakukan pengecekan peran pengguna di sini
        if ($request->user() && $request->user()->role !== 'Author') {
            $request->session()->flash('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            // Redirect ke halaman lain atau tampilkan pesan 'Unauthorized'
            return redirect('/unauthorized');
        }
       
        return $next($request);
    }
}
