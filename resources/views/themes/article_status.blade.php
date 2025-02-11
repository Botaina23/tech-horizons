@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Statut des articles du thème : {{ $theme->name }}</h1>

    <!-- Articles en attente -->
    <h2>Articles en attente</h2>
    @forelse ($articlesPending as $article)
        <div>
            <h3>{{ $article->title }}</h3>
            <p>{{ $article->content }}</p>
            <span style="color: orange; font-weight: bold;">En attente</span>

            <!-- Formulaire pour modifier le statut -->
            <form action="{{ route('articles.update_status', $article->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('PATCH')
                <button name="status" value="accepted" class="btn btn-success">Accepter</button>
                <button name="status" value="rejected" class="btn btn-danger">Refuser</button>
                <button name="status" value="pending" class="btn btn-warning">En attente</button>
            </form>
        </div>
    @empty
        <p>Aucun article en attente.</p>
    @endforelse

    <!-- Articles acceptés -->
    <h2>Articles acceptés</h2>
    @forelse ($articlesAccepted as $article)
        <div>
            <h3>{{ $article->title }}</h3>
            <span style="color: green; font-weight: bold;">Accepté</span>

            <!-- Formulaire pour modifier le statut -->
            <form action="{{ route('articles.update_status', $article->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('PATCH')
                <button name="status" value="rejected" class="btn btn-danger">Refuser</button>
                <button name="status" value="pending" class="btn btn-warning">En attente</button>
            </form>
        </div>
    @empty
        <p>Aucun article accepté.</p>
    @endforelse

    <!-- Articles refusés -->
    <h2>Articles refusés</h2>
    @forelse ($articlesRejected as $article)
        <div>
            <h3>{{ $article->title }}</h3>
            <span style="color: red; font-weight: bold;">Rejeté</span>

            <!-- Formulaire pour modifier le statut -->
            <form action="{{ route('articles.update_status', $article->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('PATCH')
                <button name="status" value="accepted" class="btn btn-success">Accepter</button>
                <button name="status" value="pending" class="btn btn-warning">En attente</button>
            </form>
        </div>
    @empty
        <p>Aucun article refusé.</p>
    @endforelse

    <a href="{{ route('themes.index') }}" class="btn btn-secondary">Retour à la liste des thèmes</a>
</div>
@endsection