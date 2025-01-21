<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Laravel')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <!-- Tambahkan navigasi di sini -->
        <a href="{{ url('/') }}">Home</a>
        @auth
            <a href="{{ url('/dashboard') }}">Dashboard</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
        @guest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endguest
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <!-- Tambahkan footer di sini -->
        <p>&copy; {{ date('Y') }} Aplikasi Laravel</p>
    </footer>
</body>
</html>
