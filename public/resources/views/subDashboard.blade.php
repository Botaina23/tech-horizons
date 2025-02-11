@extends('layouts.SubscriberViews')

@section('title')
    Articles from Subscribed Themes
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ArticlesInTheme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themes.css') }}">
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/ArticlesInTheme.css') }}"> <!-- Home page styles -->

<div class="container">
    <h1>Explore articles from Your Subscribed Themes</h1>



    <ul class="article-list">
        @foreach ($themes as $theme)
            @foreach ($theme->articles as $article)
                <li class="article-item">
                    <div class="article-content">
                        <h2 class="article-title">{{ $article->title }}</h2>
                        @if ($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="article-image">
                        @endif
                        <!-- Short preview of the description -->
                        <p class="article-preview">
                            {{ Str::limit($article->content, 100) }} <!-- Show only 100 characters -->
                        </p>
                        <!-- Button to read the full article -->
                        <a href="{{ route('articles.show', $article->id) }}" class="article-button">Lire l'article</a>
                        <!-- Bouton Éditer l'article -->

                    </div>
                </li>
            @endforeach
        @endforeach
    </ul>
    <div class="info">
        <img src="{{ asset('images/information.png') }}" alt="" width="32px"> 
        <span>This list contains the articles from the themes you are subscribed to. If you want to add other themes, click the 'Plus' button below.</span>
    </div>
    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection