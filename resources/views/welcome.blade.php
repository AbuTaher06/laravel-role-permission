<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        *{
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body class="bg-light text-dark d-flex flex-column justify-content-between  min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary w-100">
        <div class="container mt-0">
            <a class="navbar-brand text-white" href="{{ url('/') }}">Laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Log In</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container text-center my-5">
        <h1 class="display-4 fw-bold mb-3">Welcome to Laravel</h1>
        <p class="lead mb-4">Start building your amazing application with Laravel.</p>

        @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-success btn-lg">Go to Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Log In</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg ms-3">Register</a>
            @endif
        @endauth
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white py-3 w-100 text-center">
        <p>&copy; {{ date('Y') }} Laravel App. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
