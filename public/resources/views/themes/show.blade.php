@extends('layouts.subscriberViews')

@section('title')
    <!-- Add your title here if needed -->
@endsection


<link rel="stylesheet" href="{{ asset('css/ArticlesInTheme.css') }}"> <!-- Home page styles -->


@section('content')
<div class="container">
    <h1>Articles du thème : {{ $theme->name }}</h1>


    <ul class="article-list">
        @foreach ($theme->articles as $article)
            <li class="article-item">
                <div class="article-content">
                    <h2 class="article-title">{{ $article->title }}</h2>
                    @if ($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="article-image">
                    @endif
                    <p class="article-description">{{ $article->content }}</p>
                    <a href="{{ route('articles.show', $article->id) }}" class="article-button">Lire l'article</a>

                </div>
            </li>
        @endforeach
    </ul>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection