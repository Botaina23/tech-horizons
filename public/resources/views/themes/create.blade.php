@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/createtheme.css') }}">
<div class="container theme-form">
    <h1 class="form-title">Créer un nouveau thème</h1>
    <form action="{{ route('themes.store') }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        <div class="form-group">
            <label for="name">Nom du thème :</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" name="description" rows="4" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image :</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Créer le thème</button>
    </form>
</div>
@endsection