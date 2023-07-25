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

        header>.home-login>a,
        header>.register>a {
            text-decoration: none;
            margin-left: 35px;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgb(6, 6, 83);
        }

        header>.home-login>a:hover,
        header>.register>a:hover {
            color: rgb(49, 119, 188)
        }

        .hero {
            height: 35vh;
            text-align: center;
        }

        h1 {
            font-size: 40px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 200;
        }

        h5 {
            font-size: 28px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 200;
            letter-spacing: 2px
        }

        img {
            width: 50%;
            margin-left: 25%;
        }

        .img-section {
            margin: 50px 0;
        }

        footer {
            background-color: rgba(241, 245, 244, 0.795);
            height: 7vh;
            margin: 0;
            text-align: center;
            padding-top: 2vh;
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
        <h5>Take a look at what the ToDo app looks like &#128064;</p>
    </div>
    <div class="img-section"><img src="{{ asset('img') . '/login.png' }}" alt="Login page"></div>
    <div class="img-section"><img src="{{ asset('img') . '/todo-home-page.png' }}" alt="Home page"></div>
    <div class="img-section"><img src="{{ asset('img') . '/create.png' }}" alt="Create page"></div>
    <div class="img-section"><img src="{{ asset('img') . '/list.png' }}" alt="List page"></div>

    <footer>
        <p> &copy; 2023 Copyright: ToDo App</p>
    </footer>
</body>

</html>
