<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    // Afficher la liste des thèmes
    public function index()
    {
        $themes = Theme::all();
        return view('themes.index', compact('themes'));
    }
    public function indexMythemes()
    {
        $themes = Theme::all();
        return view('responsable.Mythemes', compact('themes'));
    }

    // Afficher le formulaire de création d'un thème
    public function create()
    {
        return view('themes.create');
    }

     // Stocke un nouveau thème

public function store(Request $request)
{
    // Validation des données
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Création du thème
    $theme = new Theme();
    $theme->name = $validated['name'];
    $theme->description = $validated['description'] ?? null;

    // Gestion de l'image
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('themes', 'public');
        $theme->image = $path;
    }

    $theme->save();

    // Redirection avec un message de succès
    return redirect()->route('allathemeRespo')->with('success', 'Thème créé avec succès.');
}



public function show(Theme $theme)
{
    return view('themes.show', compact('theme'));
}


    // Afficher les statistiques d'un thème
    public function stats($id)
    {
        $theme = Theme::findOrFail($id);
        $articles = $theme->articles;
        $subscribers = $theme->subscribers;
        return view('themes.stats', compact('theme', 'articles', 'subscribers'));
    }
    public function showThemeSelection()
    {
        $themes = Theme::all();
        return view('test', compact('themes'));
    }

    public function storeUserThemes(Request $request)
    {
        $user = Auth::user();
    
        // If the user is not authenticated (e.g., just registered), fetch the user from the session
        if (!$user) {
            $user = User::find(session('registered_user_id'));
        }
    
        // Validate the request
        $request->validate([
            'themes' => 'required|array',
            'themes.*' => 'exists:themes,id',
        ]);
    
        // Save the selected themes
        foreach ($request->themes as $themeId) {
            Subscription::create([
                'user_id' => $user->id,
                'theme_id' => $themeId,
            ]);
        }
    
        // Log in the user
        Auth::login($user);
    
        // Clear the session data
        session()->forget('registered_user_id');
    
        // Redirect to the dashboard
        return redirect()->route('subscribed.articles')->with('success', 'Themes selected successfully!');
    }
    public function myThemes()
    {
        $user = Auth::user(); // Récupérer l'utilisateur connecté
    
        // Récupérer les thèmes créés par cet utilisateur en utilisant la relation dans la table pivot
        $themes = $user->themes()->wherePivot('created_by', $user->id)->get();
    
        return view('themes.myThemes', compact('themes')); // Retourner la vue avec les thèmes
    }
    public function statistics(Theme $theme)
    {
        // Statistiques des articles
        $totalArticles = $theme->articles()->count();
        $articlesEnCours = $theme->articles()->where('status', 'pending')->count();
        $articlesPublies = $theme->articles()->where('status', 'accepted')->count();
        $articlesRefuses = $theme->articles()->where('status', 'rejected')->count();

        // Statistiques des abonnés
        $totalSubscribers = $theme->subscribers()->count();

        // Statistiques des commentaires sur les articles
        $totalComments = $theme->articles()->withCount('comments')->get()->sum('comments_count');

        // Passez $theme à la vue
        return view('themes.statistics', compact(
            'theme',
            'totalArticles',
            'articlesEnCours',
            'articlesPublies',
            'articlesRefuses',
            'totalSubscribers',
            'totalComments'
        ));
    }
    public function articlesStatus(Theme $theme)
    {
        $articlesPending = $theme->articles()->where('status', 'pending')->get();
        $articlesAccepted = $theme->articles()->where('status', 'accepted')->get();
        $articlesRejected = $theme->articles()->where('status', 'rejected')->get();

        return view('themes.article_status', compact('theme', 'articlesPending', 'articlesAccepted', 'articlesRejected'));
    }

}
