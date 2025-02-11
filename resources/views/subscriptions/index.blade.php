@extends('layouts.app')

@section('content')
<h1>Mes Abonnements</h1>
@foreach($subscriptions as $subscription)
    <div class="subscription">
        <h2>{{ $subscription->name }}</h2>
        <form action="{{ route('themes.unsubscribe', $subscription->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Se désabonner</button>
        </form>
    </div>
@endforeach
@endsection
