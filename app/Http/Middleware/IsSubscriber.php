<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsSubscriber
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté et a le rôle "subscriber"
        if (Auth::check() && Auth::user()->role === 'subscriber') {
            return $next($request);
        }

        // Redirige l'utilisateur s'il n'a pas le bon rôle
        return redirect('/')->with('error', 'Accès refusé. Vous devez être un abonné pour accéder à cette page.');
    }
}