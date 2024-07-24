<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .nav {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .nav a {
            color: #636b6f;
            text-decoration: none;
            font-weight: 600;
            padding: 10px;
            border: 1px solid #636b6f;
            border-radius: 5px;
        }
        .nav a:hover {
            background-color: #636b6f;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Welcome to {{ config('app.name', 'code challenge') }}</h1>
    </div>
    <div class="nav">
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/customers') }}">Customers</a>
                    <a href="{{ url('/services') }}">Services</a>
            </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</div>
</body>
</html>
