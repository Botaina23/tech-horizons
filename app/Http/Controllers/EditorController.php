<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Subscription;
use App\Models\Theme;

class EditorController extends Controller
{
    public function dashboard()
    {
        // Récupération des statistiques globales des articles
        $totalArticles = Article::count();
        $articlesPending = Article::where('status', 'pending')->count();
        $articlesAccepted = Article::where('status', 'accepted')->count();
        $articlesRejected = Article::where('status', 'rejected')->count();

        // Récupération des statistiques des abonnés
        $totalSubscribers = Subscription::count();

        // Récupération des statistiques des thèmes
        $totalThemes = Theme::count();
        $themesWithMostArticles = Theme::withCount('articles')
                                    ->orderBy('articles_count', 'desc')
                                    ->take(5) // Afficher les 5 thèmes les plus actifs
                                    ->get();

        $themesWithMostSubscribers = Theme::withCount('subscribers')
                                    ->orderBy('subscribers_count', 'desc')
                                    ->take(5) // Afficher les 5 thèmes les plus populaires
                                    ->get();

        return view('editor.dashboard', compact(
            'totalArticles', 'articlesPending', 'articlesAccepted', 'articlesRejected',
            'totalSubscribers', 'totalThemes', 'themesWithMostArticles', 'themesWithMostSubscribers'
        ));
    }
}