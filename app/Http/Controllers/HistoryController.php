<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\History;

class HistoryController extends Controller
{


public function showHistory(Request $request)
{
    $user = Auth::user(); // Récupère l'utilisateur connecté

    // Construire la requête
    $query = History::where('user_id', $user->id)->with('article.theme');

    // Filtrer par date
    if ($request->has('date') && !empty($request->date)) {
        $query->whereDate('created_at', $request->date);
    }

    // Filtrer par thème
    if ($request->has('theme') && !empty($request->theme)) {
        $query->whereHas('article.theme', function ($q) use ($request) {
            $q->where('name', $request->theme);
        });
    }

    // Récupérer les résultats
    $history = $query->orderBy('created_at', 'desc')->get();

    // Retourner la vue
    return view('history.index', compact('history'));
}



}

