@extends('layouts.app')
@section('content')
<link href="{{ asset('css/LoginStyle.css') }}" rel="stylesheet">

<div class="wrapper">
    
<div class="buttonBox">
  <div id="btn" style="left: 110px;"></div>
   <a href="{{ route('login') }}" class="card-header" style="text-decoration: none; color: inherit;">
      {{ __('Login') }}
   </a>
   <a href="{{ route('register') }}" class="card-header" style="text-decoration: none; color: inherit;">
       {{ __('Register') }}
   </a>
</div>

    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="inputbox">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="inputbox">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="inputbox">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="inputbox">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            </div>

            <button type="submit" class="btn">
                {{ __('Register') }}
            </button>

            <div class="regLink">
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </div>
</div>

<!-- Go Back Button -->
<div class="goback">
    <a href="{{ url('/') }}">
        <input type="image" src="{{ asset('../images/arrow.png') }}" alt="Go Back">
    </a>
</div>
<style>
    .wrapper{
        height: 580px;
    }
</style>
@endsection