@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/edit&show.css') }}">

<div class="container">
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->content }}</p>

    @if ($article->image)
        <div >
            <img src="{{ asset('storage/' . $article->image) }}"
                 alt="{{ $article->title }}"
                >
        </div>
    @endif

    <h2>Commentaires</h2>

@foreach ($article->comments as $comment)
    <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->message }}</p>
@endforeach

<!-- Formulaire pour ajouter un commentaire -->
<form action="{{ route('comments.store', $article->id) }}" method="POST" class="comment-form">
    @csrf
    <div class="comment-box">
        <textarea name="message" id="message" rows="1" placeholder="Écrire un commentaire..." required></textarea>
        <button type="submit">
            <img src="{{ asset('../images/send.png') }}"> <!-- Icône d'envoi -->
        </button>
    </div>
</form>


</div>
<div class="goback">
    <a href="{{ url('/subscribed-articles') }}">
        <input type="image" src="{{ asset('../images/go_back_btn.png') }}" alt="Go Back">
    </a>
</div>

   
@endsection