@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Statistiques pour le thème : {{ $theme->name }}</h1>

    <h2>Articles</h2>
    <ul>
        <li>Total d'articles : {{ $totalArticles }}</li>
        <li>Articles en cours : {{ $articlesEnCours }}</li>
        <li>Articles publiés : {{ $articlesPublies }}</li>
        <li>Articles refusés : {{ $articlesRefuses }}</li>
    </ul>

    <h2>Abonnés</h2>
    <p>Total d'abonnés : {{ $totalSubscribers }}</p>

    <h2>Commentaires</h2>
    <p>Total de commentaires : {{ $totalComments }}</p>

    <a href="{{ route('themes.show', $theme->id) }}" class="btn btn-primary">Retour au thème</a>
</div>
@endsection