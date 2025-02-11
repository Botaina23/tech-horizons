<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;
use App\Models\History;

class ArticleController extends Controller
{
    // Page d'accueil
    public function index()
    {
        $themes = Theme::all();
        $articles = Article::where('status', 'published')->get();
        return view('home', compact('themes', 'articles'));
    }

     // Affiche le formulaire de création d'article
     public function create(Theme $theme)
     {
         return view('articles.create', compact('theme'));
     }


     // Enregistre un nouvel article


// Enregistre un nouvel article
public function store(Request $request, Theme $theme)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|in:pending,accepted,rejected'
    ]);

    $article = new Article();
    $article->title = $validated['title'];
    $article->content = $validated['content'];
    $article->theme_id = $theme->id;
    $article->user_id = Auth::id();
    $article->status = $validated['status']; // Définir le statut choisi (en attente, accepté, ou refusé)

    // Gestion de l'image
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('articles', 'public');
        $article->image = $path;
    }

    $article->save();

    return redirect()->route('themes.articles_status', ['theme' => $theme->id]) // Rediriger vers la page de gestion des statuts
                     ->with('success', 'Article créé et statut mis à jour.');
}


public function status($id)
{
$article = Article::findOrFail($id);
return view('articles.status', compact('article'));
}



    // Page "About Us"
    public function aboutUs()
    {
        return view('about-us');
    }

    // Page des thèmes
    public function themes()
    {
        $themes = Theme::all();
        return view('themes', compact('themes'));
    }

    // Page d'inscription
    public function subscribe()
    {
        return view('subscribe');
    }

    // Afficher un article spécifique


    public function show($id)
    {
        // Récupérer l'article par son ID
        $article = Article::findOrFail($id);

        // Enregistrer l'article dans l'historique de l'utilisateur connecté
        if (Auth::check()) {
            History::create([
                'user_id' => Auth::id(),
                'article_id' => $article->id,
            ]);
        }

        // Retourner la vue avec les détails de l'article
        return view('articles.show', compact('article'));
    }
    public function articlesBySubscribedThemes()
    {
        $user = Auth::user();  // Get the authenticated user

        // Fetch the subscribed themes
        $themes = $user->subscribedThemes;

        // Initialize an array to hold articles from each theme
        $articles = [];

        // Loop through each theme and retrieve its articles
        foreach ($themes as $theme) {
            $articles[$theme->name] = $theme->articles;  // Store articles for each theme by name
        }

        // Pass themes and articles to the view
        return view('subDashboard', compact('articles'));
    }
    public function showSubscribedArticles()
{
    // Get the authenticated user
    $user = Auth::user();

    // Fetch the themes that the user is subscribed to
    $themes = $user->themes()->with('articles')->get(); // Assuming a many-to-many relationship between users and themes

    // Pass the themes to the view
    return view('subDashboard', compact('themes'));

}
public function showArticlesByUser()
{
    $user = auth::user();
    $articles = $user->articles; // Assurez-vous que la relation est bien définie dans le modèle User

    return view('articles.MyArticles', compact('articles'));
}

public function destroy($id)
{
    $article = Article::findOrFail($id);
    $themeId = $article->theme_id;
    $article->delete();

    return redirect()->route('user.articles', $themeId)
                     ->with('success', 'Article supprimé avec succès.');
}
    public function edit($id)
{
    $article = Article::findOrFail($id);
    return view('articles.edit', compact('article'));
}
public function updateStatus(Request $request, Article $article)
{
    // Valider le statut
    $request->validate([
        'status' => 'required|in:pending,accepted,rejected'
    ]);

    // Mettre à jour le statut
    $article->status = $request->status;
    $article->save();

    // Rediriger vers la page de gestion des statuts du thème
    return redirect()->route('themes.articles_status', ['theme' => $article->theme_id])
                     ->with('success', 'Le statut de l\'article a été mis à jour.');
}

}


