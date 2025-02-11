  
  @extends('layouts.guestViews')

@section('title')
    <!-- Add your title here if needed -->
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/themes.css') }}"> <!-- Home page styles -->
@endsection

@section('content')
    <div class="container">
        <h1>Liste des thèmes</h1>

        <div class="themes">
            <!-- Button to create a new theme -->
            <div class="icon-container" style="align-items: center;">
                <a href="{{ route('themes.create') }}" class="icon-btn" id="top-btn" title="Créer un article">
                                    <img src="{{ asset('images/template.png') }}" alt="Créer un nouveau thème">
                                    <span class="hover-text">Créer un nouveau thème</span>
                                </a>
            </div>

            <div class="info">
           <img src="{{ asset('images/information.png') }}" alt="" width="32px"> <span>This list contains the themes you are subscribed to. If you want to add other themes, click the 'Plus' button below.</span>
           </div>
            <ul style="list-style-type: none;">
                @foreach ($themes as $theme)
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
                    <hr>
                @endforeach
                
            </ul>
        </div>
    </div>
@endsection