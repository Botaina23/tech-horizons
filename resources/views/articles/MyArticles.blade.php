@extends('layouts.subscriberViews')

@section('title', 'Mes Articles')

<link rel="stylesheet" href="{{ asset('css/ArticlesInTheme.css') }}">

@section('content')
<div class="container">
    <h1>Mes articles</h1>
    <br> <br>
    <ul class="article-list">
        @foreach ($articles as $article)
            <li class="article-item">
                <div class="article-content">
                    <h2 class="article-title">{{ $article->title }}</h2>

                    @if ($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="article-image">
                    @endif
                    <p class="article-description">{{ $article->content }}</p>
                    <a href="{{ route('articles.show', $article->id) }}" class="article-button">Lire l'article</a>

                    <!-- Bouton Éditer avec icône -->
                     <div class="bottom-btn">
<a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">
    <img src="{{ asset('../images/writing.png') }}" alt="">
    <span>Éditer</span>
</a>

<!-- Bouton Supprimer avec icône -->
<form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
        <img src="{{ asset('../images/delete.png') }}" alt="">
        <span>Supprimer</span>
    </button>
</form> </div>

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
