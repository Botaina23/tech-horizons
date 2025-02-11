@extends('layouts.subscriberViews')
@section('title', 'Dashboard')
@section('content')
<link rel="stylesheet" href="{{ asset('css/themes.css') }}"> <!-- Home page styles -->
 
<div class="container">

       <div class="info">
           <img src="{{ asset('images/information.png') }}" alt="" width="32px"> <span>This list contains the
             themes you are subscribed to. If you want to add other themes, click the 'Plus' button below.  <br> </span>
        </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2></h2>
    @if($selectedThemes->isEmpty())
        <p>You have not selected any themes yet.</p>
    @else
        <ul>
            @foreach($selectedThemes as $theme)
            <li>
                        <div class="bar">
                            <!-- Display theme image if available -->
                            @if ($theme->image)
                                <img class=".bar img" src="{{ asset('storage/' . $theme->image) }}" alt="{{ $theme->name }}">
                            @endif

                            <!-- Theme description -->
                            <div id="desc">
                                <label for="">General concept:</label>
                                <span>{{ $theme->name }}</span>
                                <hr>
                                <label for="">About:</label>
                                <span>{{ $theme->description }}</span>
                                <label for="">Number of articles::</label>
                                <span>10</span>
                                <label for="">Followers:</label>
                                <span>10</span>
                            </div>

                            <!-- Icons for actions -->
                            <div class="icon-container">
                                <!-- Button to view articles -->
                                <a href="{{ route('themes.show', $theme->id) }}" class="icon-btn" title="Voir les articles">
                                    <img src="{{ asset('images/application.png') }}" alt="Voir les articles">
                                    <span class="hover-text">Voir les articles</span>
                                </a>

                                <!-- Button to create an article -->
                                <a href="{{ route('articles.create', $theme->id) }}" class="icon-btn" title="Créer un article">
                                    <img src="{{ asset('images/copywriting.png') }}" alt="Créer un article">
                                    <span class="hover-text">Créer un article</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <br>
              
                    <br>
            @endforeach
        </ul>
        <div class="goback">

    @endif
    <a href="{{ route('select-themes') }}">
        <input type="image" src="{{ asset('../images/subsc.png') }}" width="48px" alt="Go Back">
    </a>
</div>
@endsection