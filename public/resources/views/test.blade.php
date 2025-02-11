@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/createtheme.css') }}">
<div class="container theme-form">
    <h1 class="form-title">Select Your Interested Themes</h1>
    <form action="{{ route('user.themes.store') }}" method="POST" class="form">
        @csrf
        <div class="form-group">
            @foreach($themes as $theme)
                <div class="theme-checkbox">
                    <input type="checkbox" id="theme_{{ $theme->id }}" name="themes[]" value="{{ $theme->id }}">
                    <label for="theme_{{ $theme->id }}">{{ $theme->name }}</label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Save Themes</button>
    </form>
</div>
@endsection