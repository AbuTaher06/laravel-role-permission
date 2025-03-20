<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1>Welcome to your Dashboard, {{ Auth::user()->name }}!</h1>

        <div class="mt-4">
            <h3>Your Information:</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Email:</strong> {{ Auth::user()->email }}
                </li>
                <li class="list-group-item">
                    <strong>Registered Since:</strong> {{ Auth::user()->created_at->toFormattedDateString() }}
                </li>
            </ul>
        </div>

        <div class="mt-4">
            <h3>Quick Links:</h3>
            <div class="d-flex">
                <a href="{{ route('permissions.index') }}" class="btn btn-primary me-2">Permissions</a>
                <a href="{{ route('roles.index') }}" class="btn btn-success me-2">Roles</a>
                <a href="{{ route('users.index') }}" class="btn btn-info me-2">Users</a>
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
