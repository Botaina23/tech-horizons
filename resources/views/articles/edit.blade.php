@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ArticlesInTheme.css') }}">
<link rel="stylesheet" href="{{ asset('css/edit&show.css') }}">


<div class="container">
    <h1>Modifier l'article</h1>

    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Titre -->
        <div>
            <label for="title">Titre de l'article :</label>
            <input type="text" id="title" name="title" value="{{ $article->title }}" required>
        </div>

        <!-- Contenu -->
        <div>
            <label for="content">Contenu :</label>
            <textarea id="content" name="content" rows="6" required>{{ $article->content }}</textarea>
        </div>

        <!-- Image -->
        <div>
            <label for="image">Image actuelle :</label>
            @if ($article->image)
                <div>
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" width="200" style="margin-bottom: 10px;">
                </div>
            @endif
            <input type="file" id="image" name="image">
        </div>

        <!-- Statut -->
        <div>
            <label for="status">Statut :</label>
            <select id="status" name="status" required>
                <option value="pending" {{ $article->status == 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="accepted" {{ $article->status == 'accepted' ? 'selected' : '' }}>Accepté</option>
                <option value="rejected" {{ $article->status == 'rejected' ? 'selected' : '' }}>Rejeté</option>
            </select>
        </div>

        <!-- Bouton de mise à jour -->
        <button type="submit">Mettre à jour</button>
    </form>
</div>
@endsection
