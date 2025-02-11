<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanAccessIssue
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté et a le rôle "theme_manager" ou "admin"
        if (Auth::check() && (Auth::user()->role === 'theme_manager' || Auth::user()->role === 'admin')) {
            return $next($request);
        }

        // Redirige l'utilisateur s'il n'a pas la permission
        return redirect('/')->with('error', 'Accès refusé. Vous n\'avez pas la permission d\'accéder à ce numéro.');
    }
}