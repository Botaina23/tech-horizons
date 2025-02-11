@extends('layouts.app')

@section('content')
<link href="{{ asset('css/loginStyle.css') }}" rel="stylesheet">

<div class="wrapper">
 <div class="buttonBox">
  <div id="btn"></div>
   <a href="{{ route('login') }}" class="card-header" style="text-decoration: none; color: inherit;">
      {{ __('Login') }}
   </a>
   <a href="{{ route('register') }}" class="card-header" style="text-decoration: none; color: inherit;">
       {{ __('Register') }}
   </a>
</div>

    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="inputbox">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="inputbox">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="rem-forgot">
                <label for="remember">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    {{ __('Remember Me') }}
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>

            <button type="submit" class="btn">
                {{ __('Login') }}
            </button>

            <div class="regLink">
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
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
@endsection