<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté et a le rôle "admin"
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Redirige l'utilisateur s'il n'a pas le bon rôle
        return redirect('/')->with('error', 'Accès refusé. Vous devez être un administrateur pour accéder à cette page.');
    }
}