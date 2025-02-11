@extends('layouts.respoViews')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Editor.css') }}"> <!-- Home page styles -->

<div class="container">
    <h1>📊 Dashboard de l'Éditeur</h1>

    <!-- Statistiques des Articles -->
    <h2>📝 Statistiques des Articles</h2>
    <ul>
        <li><strong>Total d'articles :</strong> {{ $totalArticles }}</li>
        <li><strong>🕐Articles en attente :</strong> {{ $articlesPending }}</li>
        <li><strong>✅ Articles acceptés :</strong> {{ $articlesAccepted }}</li>
        <li><strong>❌Articles refusés :</strong> {{ $articlesRejected }}</li>
    </ul>

    <!-- Statistiques des Abonnés -->
    <h2>👥 Statistiques des Abonnés</h2>
    <p><strong>Total d'abonnés :</strong> {{ $totalSubscribers }}</p>

    <!-- Statistiques des Thèmes -->
    <h2>📚 Statistiques des Thèmes</h2>
    <ul>
        <li><strong>Total de thèmes :</strong> {{ $totalThemes }}</li>
    </ul>

    <!-- Top 5 Thèmes avec le plus d'articles -->
    <h3>🔥 Top 5 Thèmes avec le plus d'articles</h3>
    <ul>
        @foreach ($themesWithMostArticles as $theme)
            <li>{{ $theme->name }} ({{ $theme->articles_count }} articles)</li>
        @endforeach
    </ul>

    <!-- Top 5 Thèmes avec le plus d'abonnés -->
    <h3>🏆 Top 5 Thèmes les plus populaires</h3>
    <ul>
        @foreach ($themesWithMostSubscribers as $theme)
            <li>{{ $theme->name }} ({{ $theme->subscribers_count }} abonnés)</li>
        @endforeach
    </ul>

</div>
@endsection