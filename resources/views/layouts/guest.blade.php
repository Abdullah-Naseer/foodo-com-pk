<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: Arial, sans-serif; }
        .content { padding: 20px; }
    </style>
</head>
<body>

    <header class="py-3">
        <div class="container text-center">
            <a href="{{ url('/') }}" class="text-white text-decoration-none">
                <img src="{{ asset('public/assets/images/logo/foodo-logo.png') }}" alt="" width="200" height="65">
            </a>
        </div>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer class="text-center text-muted py-3 mt-4">
        &copy; {{ date('Y') }} {{ config('app.name') }} | <a href="{{ config('app.url') }}" class="text-primary">{{ config('app.url') }}</a>
    </footer>
@stack('scripts')

</body>
</html>
