

@extends('layouts.guestViews')

@section('title', 'Themes')
@section('styles')
  <link rel="stylesheet" href="{{ asset('css/themes.css') }}"> <!-- Themes page styles -->
@endsection
@section('content')
<div id="themes-container" data-is-logged-in="{{ auth()->check() ? 'true' : 'false' }}">
    <!-- Contenu de ta page -->
</div>

<link rel="stylesheet" href="{{ asset('css/themes.css') }}">
  <div class="container">
    <h1>All Themes Details</h1>
    <div class="themes">
      <!-- Theme 1: Artificial Intelligence -->
      <div class="bar" id="bar1">
        <img src="{{ asset('images/IAimage.jpg') }}" alt="">
        <div id="desc">
          <label for="">General concept:</label> 
          <span>ARTIFICIAL INTELLIGENCE</span>
          <label for="">About:</label> 
          <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At fugiat quod ex quaerat illum, a saepe voluptate inventore eum aut repellat, recusandae excepturi amet doloremque molestiae labore ipsa eveniet nisi.</span>
          <label for="">Number of articles:</label> 
          <span>45</span>
          <label for="">Followers:</label> 
          <span>1.5K</span>
        </div>
        <form onsubmit="handleSubscribe(event)" data-theme-id="1">
            @csrf
            <input type="image" id="subscribe-btn-1" src="{{ asset('images/subsc.png') }}" class="plus_btn">
        </form>
      </div>
      <hr>

      <!-- Theme 2: Cybersecurity -->
      <div class="bar" id="bar2">
        <img src="{{ asset('images/cyberImage.jpg') }}" alt="">
        <div id="desc">
          <label for="">General concept:</label> 
          <span>CYBERSECURITY</span>
          <label for="">About:</label> 
          <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At fugiat quod ex quaerat illum, a saepe voluptate inventore eum aut repellat, recusandae excepturi amet doloremque molestiae labore ipsa eveniet nisi.</span>
          <label for="">Number of articles:</label> 
          <span>45</span>
          <label for="">Followers:</label> 
          <span>1.5K</span>
        </div>
        <form onsubmit="handleSubscribe(event)" data-theme-id="2">
            @csrf
            <input type="image" id="subscribe-btn-2" src="{{ asset('images/subsc.png') }}" class="plus_btn">
        </form>
      </div>
      <hr>

      <!-- Theme 3: Virtual Reality -->
      <div class="bar" id="bar3">
        <img src="{{ asset('images/VR.jpg') }}" alt="">
        <div id="desc">
          <label for="">General concept:</label> 
          <span>VIRTUAL REALITY</span>
          <label for="">About:</label> 
          <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At fugiat quod ex quaerat illum, a saepe voluptate inventore eum aut repellat, recusandae excepturi amet doloremque molestiae labore ipsa eveniet nisi.</span>
          <label for="">Number of articles:</label> 
          <span>45</span>
          <label for="">Followers:</label> 
          <span>1.5K</span>
        </div>
        <form onsubmit="handleSubscribe(event)" data-theme-id="3">
            @csrf
            <input type="image" id="subscribe-btn-3" src="{{ asset('images/subsc.png') }}" class="plus_btn">
        </form>
      </div>
      <hr>

      <!-- Theme 4: Internet of Things -->
      <div class="bar" id="bar4">
        <img src="{{ asset('images/inter.avif') }}" alt="">
        <div id="desc">
          <label for="">General concept:</label> 
          <span>INTERNET OF THINGS</span>
          <label for="">About:</label> 
          <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At fugiat quod ex quaerat illum, a saepe voluptate inventore eum aut repellat, recusandae excepturi amet doloremque molestiae labore ipsa eveniet nisi.</span>
          <label for="">Number of articles:</label> 
          <span>45</span>
          <label for="">Followers:</label> 
          <span>1.5K</span>
        </div>
        <form onsubmit="handleSubscribe(event)" data-theme-id="4">
            @csrf
            <input type="image" id="subscribe-btn-4" src="{{ asset('images/subsc.png') }}" class="plus_btn">
        </form>
      </div>
    </div>
  </div>

  @if(!auth()->check())
  <div id="custom-dialogue" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center;">
    <div style="background: white; padding: 20px; border-radius: 10px; text-align: center;">
      <p>You need to log in to subscribe to themes.</p>
      <button id="login-btn" style="margin: 10px; padding: 10px 20px; background: blue; color: white; border: none; border-radius: 5px;">Log In</button>
      <button id="register-btn" style="margin: 10px; padding: 10px 20px; background: green; color: white; border: none; border-radius: 5px;">Register</button>
    </div>
  </div>
  @endif

  <script>
function handleSubscribe(event) {
    event.preventDefault(); // Empêche la soumission immédiate du formulaire

    // Récupérer l'état de connexion à partir de l'attribut data
    const isLoggedIn = document.getElementById('themes-container').getAttribute('data-is-logged-in') === 'true';

    // Récupérer l'ID du thème à partir de l'attribut data
    const themeId = event.target.getAttribute('data-theme-id');

    if (!isLoggedIn) {
        // Afficher la boîte de dialogue si l'utilisateur n'est pas connecté
        const dialogueBox = document.getElementById('custom-dialogue');
        dialogueBox.style.display = 'flex';
    } else {
        // Changer l'image source
        const button = document.getElementById(`subscribe-btn-${themeId}`);
        button.src = "{{ asset('images/check-mark.png') }}"; // Remplacez par le nouveau chemin de l'image

        // Soumettre le formulaire
        event.target.submit();
    }
}


    // Handle login and register button clicks
    document.getElementById('login-btn')?.addEventListener('click', function () {
        window.location.href = "{{ route('login') }}";
    });

    document.getElementById('register-btn')?.addEventListener('click', function () {
        window.location.href = "{{ route('register') }}";
    });

    // Close the dialogue box when clicking outside of it
    window.addEventListener('click', function (event) {
        const dialogueBox = document.getElementById('custom-dialogue');
        if (event.target === dialogueBox) {
            dialogueBox.style.display = 'none';
        }
    });
  </script>
@endsection