<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Horizons | Login</title>
    <link rel="icon" href="{{ asset('images/favicon (2).png') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/subStyle.css') }}">
</head>
<body>
    <div class="goback">
        <a href="{{ route('home') }}">
            <input type="image" src="{{ asset('images/arrow.png') }}">
        </a>
    </div>

    <div class="wrapper">
        <form action="">
            <h1>Login</h1>
            <div class="inputbox">
                <input type="text" placeholder="username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="inputbox">
                <input type="password" placeholder="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="rem-forgot">
                <label for=""> <input type="checkbox">Remember me </label>
                <a href="#">Forgot password</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="regLink">
                <p>Don't have an account? <a href="#">Sign up</a></p>
            </div>
        </form>
    </div>
</body>
</html>
