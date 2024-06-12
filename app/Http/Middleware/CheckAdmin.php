<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Verificar si el usuario está autenticado y es admin
        if (Auth::check() && Auth::user()->status == 'admin') {
            return $next($request);
        }

        // Si no es admin, redirigir al índice
        return redirect('/');
    }
}
