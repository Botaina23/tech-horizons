
@extends('layouts.app')

@section('title', 'Subscriber Dashboard')

@section('content')
    <div class="dashboard-container">
        <!-- Menu -->
         <h1 > hi every body </h1>
        <div class="dashboard-menu">
            <ul>
                <li><a href="{{ route('subscriber.dashboard') }}">Home</a></li>
                <li><a href="{{ route('subscriber.history') }}">History</a></li>
                <li><a href="{{ route('subscriber.profile') }}">Profile</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Body -->
        <div class="dashboard-body">
            <!-- Articles from Subscribed Themes -->
            <div class="articles-container">
                @foreach ($articles as $article)
                    <div class="article-card">
                        <h3>{{ $article->title }}</h3>
                        <p>{{ $article->content }}</p>
                        <p><strong>Theme:</strong> {{ $article->theme->name }}</p>

                        <!-- Rating Section -->
                        <div class="rating-section">
                            <p><strong>Rating:</strong> {{ $article->averageRating() }} / 5</p>
                            <form action="{{ route('article.rate', $article->id) }}" method="POST">
                                @csrf
                                <select name="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <button type="submit">Rate</button>
                            </form>
                        </div>

                        <!-- Comment Section -->
                        <div class="comment-section">
                            <h4>Comments</h4>
                            @foreach ($article->comments as $comment)
                                <div class="comment">
                                    <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->message }}</p>
                                </div>
                            @endforeach
                            <form action="{{ route('article.comment', $article->id) }}" method="POST">
                                @csrf
                                <textarea name="message" rows="3" placeholder="Write a comment..."></textarea>
                                <button type="submit">Post Comment</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Form to Write a New Article -->
            <div class="write-article">
                <h2>Write Your Own Article</h2>
                <form action="{{ route('article.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" name="content" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="theme">Theme</label>
                        <select id="theme" name="theme_id" required>
                            @foreach ($subscribedThemes as $theme)
                                <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn-submit">Submit Article</button>
                </form>
            </div>
        </div>
    </div>
@endsection
