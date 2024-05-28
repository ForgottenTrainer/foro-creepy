<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMatchMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $userId = $request->route('id'); 
        if ($userId != auth()->id()) { 
            abort(403); 
        }

        return $next($request);
    }
}
