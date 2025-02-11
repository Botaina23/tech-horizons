<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupAllThController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\EditorController;



Route::get('/', function () {
    return view('Home');
})->name('home');

Route::get('/respoDash', [ThemeController::class, 'indexMythemes'])->name('allathemeRespo');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/subscriber-only', function () {
    return 'Page réservée aux abonnés';
})->middleware('is.subscriber');

Route::get('/admin', function () {
    return 'Page réservée aux administrateurs';
})->middleware('is.admin');
Route::get('/subscribe', [SubscriptionController::class, 'showSubscribePage'])->name('subscribe');

// Route for the login page
Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login');


// Themes route



// About Us route
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about.us');

Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');




Route::get('/CR', function () {
    return view('themes.create');
});
Route::get('/SH', function () {
    return view('themes.show');
});


Route::middleware('auth')->group(function () {
});

Route::get('/themes/create', [ThemeController::class, 'create'])->name('themes.create');
Route::post('/themes', [ThemeController::class, 'store'])->name('themes.store');
Route::get('/themes', [ThemeController::class, 'index'])->name('themes.index');




Route::get('/themes/{theme}/articles/create', [ArticleController::class, 'create'])->name('articles.create');

Route::get('/themes/{theme}', [ThemeController::class, 'show'])->name('themes.show');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');


Route::middleware('auth')->group(function () {
 Route::post('/themes/{theme}/articles', [ArticleController::class, 'store'])->name('articles.store');
});

Route::get('/history', [HistoryController::class, 'showHistory'])->name('history.index')->middleware('auth');
Route::get('/select-themes', [ThemeController::class, 'showThemeSelection'])->name('test');
Route::post('/user/themes/store', [ThemeController::class, 'storeUserThemes'])->name('user.themes.store');

Route::get('/subscriberAllthemes', [SupAllThController::class, 'index'])->name('subscriber.Allthemes');
Route::get('/select-themes', [ThemeController::class, 'showThemeSelection'])->name('select-themes');
Route::get('/alth', [DashboardController::class, 'index'])->name('AllTh');


Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit'); // Formulaire d'édition
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update'); // Mise à jour
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy'); // Suppression


Route::get('/themes/{theme}/statistics', [ThemeController::class, 'statistics'])->name('themes.statistics');


Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->name('comments.store');


Route::get('/subscriber/articles', [SubscriberController::class, 'Dashboard'])->name('subscriber.articles');
Route::get('/subscribed-articles', [ArticleController::class, 'showSubscribedArticles'])->name('subscribed.articles');

Route::get('/mes-articles', [ArticleController::class, 'showArticlesByUser'])->name('user.articles')->middleware('auth');

Route::get('/themes/{theme}/statistics', [ThemeController::class, 'statistics'])->name('themes.statistics');

Route::get('themes/{theme}/articles-status', [ThemeController::class, 'articlesStatus'])->name('themes.articles_status');
Route::patch('articles/{article}/update-status', [ArticleController::class, 'updateStatus'])->name('articles.update_status');

Route::get('/editor/dashboard', [EditorController::class, 'dashboard'])->name('editor.dashboard');
