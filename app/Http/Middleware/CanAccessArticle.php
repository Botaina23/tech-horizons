<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanAccessArticle
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté et a le rôle "editor" ou "admin"
        if (Auth::check() && (Auth::user()->role === 'editor' || Auth::user()->role === 'admin')) {
            return $next($request);
        }

        // Redirige l'utilisateur s'il n'a pas la permission
        return redirect('/')->with('error', 'Accès refusé. Vous n\'avez pas la permission d\'accéder à cet article.');
    }
}
