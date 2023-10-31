<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin @yield('title', 'Jedi shop')</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/js/app.js')

</head>

<body>

    <header>
        <nav class="nav justify-content-center navbar-light bg-light shadow-lg align-items-center py-3">
            <a class="nav-link active" href="#" aria-current="page">Dashboard</a>
            <a class="nav-link" href="{{route('lightsabers.index')}}">Sabers</a>
            <a class="btn btn-info btn-sm ms-auto rounded-pill" href="{{route('home')}}">Home</a>
        </nav>
    </header>

    <main class="min-vh-100">
        @yield('content')
    </main>

    <footer class="bg-dark text-white py-4 text-center">
        <p>
            Copyright &copy; 2023 Fabio
        </p>
    </footer>

</body>

</html>