<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Registrasi Seminar') - IT PNM Summit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="site-header text-white">
        <div class="container py-4">
            <p class="eyebrow mb-2">Politeknik Negeri Madiun</p>
            <h1 class="h2 fw-bold mb-1">Registrasi Seminar Teknologi Nasional</h1>
            <p class="mb-0 opacity-75">IT PNM Summit 2025</p>
        </div>
    </header>

    <main class="container py-5">
        @yield('content')
    </main>

    <footer class="site-footer text-center py-4">
        <div class="container">
            <p class="mb-1">© 2025 IT PNM Summit</p>
            <small>Politeknik Negeri Madiun</small>
        </div>
    </footer>
</body>
</html>
