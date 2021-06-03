<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTP-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poster</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<style>
    .home_menu{
        padding: 3px;
    }
    .main_menu{
        align-items: center;
        padding: 3px;
    }
</style>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="main_menu flex">
            <li>
                <a href="" class="home_menu">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }} " class="dashboard_menu p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('posts') }} " class="post_menu p-3">Post</a>
            </li>
        </ul>

        <ul class="flex items-center">
            @auth
                <li>
                    <a href="" class="p-3">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <form action="{{ route ('logout') }}" class="inline p-3" method="post">
                        @csrf
                        <button type="submit">
                            Logout
                        </button>
                    </form>
                </li>
            @endauth

            @guest
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href={{ route('register') }} class="p-3">Register</a>
                </li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>
