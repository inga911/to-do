<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        html {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            background-color: #F8FAFC
        }

        header {
            display: flex;
            gap: 20px;
            float: right;
            width: 100vw;
            height: 10vh;
        }

        header>.home-login>a {
            text-decoration: none;
            margin-left: 25px;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        header>.register>a {
            text-decoration: none;
            margin-left: 25px;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .hero {
            height: 35vh;
            text-align: center;
        }

        h1 {
            font-size: 40px;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 200;
        }

        h5 {
            font-size: 28px;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 200;

        }

        img {
            width: 50%;
            margin-left: 25%;
        }

        footer{
            background-color: aquamarine;
            height: 15vh;
            margin: 0;
        }
    </style>
</head>

<body>
    <header>
        @if (Route::has('login'))
            @auth
                <div class="home-login">
                    <a href="{{ url('/home') }}">Home</a>
                </div>
            @else
                <div class="home-login">
                    <a href="{{ route('login') }}">Log in</a>
                </div>
                @if (Route::has('register'))
                    <div class="register">
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                @endif
            @endauth
        @endif
    </header>
    <div class="hero">
        <h1>Welcome to the TODO!</h1>
        <h5>Take a look at what the ToDo app looks like</p>
    </div>
    <img src="{{ asset('img') . '/login.png' }}" alt="Login page">
    <img src="{{ asset('img') . '/todo-home-page.png' }}" alt="Home page">
    <img src="{{ asset('img') . '/create.png' }}" alt="Create page">
    <img src="{{ asset('img') . '/list.png' }}" alt="List page">

    <footer>
<p>Terms of use</p>
<p> &copy; 2023 ToDo App</p>
    </footer>
</body>

</html>
