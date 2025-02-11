@extends('layouts.guestViews')

@section('title', 'About us')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/about-us.css') }}"> <!-- About Us page styles -->
@endsection

@section('content')
  <div class="about-us-container">
    <h1>{{ $pageData['title'] }}</h1>
    <div class="about-content">
      <section>
        <h2>Our Mission</h2>
        <p>{{ $pageData['mission'] }}</p>
      </section>
      <section>
        <h2>Our Team</h2>
        <p>{{ $pageData['team'] }}</p>
      </section>
      <section>
        <h2>Why Choose Us?</h2>
        <ul>
          @foreach ($pageData['whyChooseUs'] as $reason)
            <li>{{ $reason }}</li>
          @endforeach
        </ul>
      </section>
    </div>
  </div>
@endsection