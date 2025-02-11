@extends('layouts.subscriberViews')

@section('content')
<link rel="stylesheet" href="{{ asset('css/history.css') }}">
<div class="container">
    <h1>Mon historique</h1>

    <!-- Formulaire de filtrage -->
    <form method="GET" action="{{ route('history.index') }}">
        <div>
            <label for="date">Filtrer par date :</label>
            <input type="date" id="date" name="date" value="{{ request('date') }}">
        </div>
        <div>
            <label for="theme">Filtrer par thème :</label>
            <select id="theme" name="theme">
                <option value="">Tous les thèmes</option>
                @foreach ($history->pluck('article.theme.name')->unique() as $theme)
                    <option value="{{ $theme }}" {{ request('theme') == $theme ? 'selected' : '' }}>
                        {{ $theme }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Filtrer</button>
    </form>

    <!-- Liste de l'historique -->
    <ul>
        @forelse ($history as $entry)
            <li>
                <h2>{{ $entry->article->title }}</h2>
                <p>{{ $entry->article->content }}</p>
                <p><strong>Date de consultation :</strong> {{ $entry->created_at->format('d/m/Y H:i') }}</p>
                <a href="{{ route('articles.show', $entry->article->id) }}">Voir l'article</a>
            </li>
        @empty
            <p>Aucun historique disponible.</p>
        @endforelse
    </ul>
</div>
@endsection
