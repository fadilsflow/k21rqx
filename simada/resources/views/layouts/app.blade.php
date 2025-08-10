<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'SIMADA')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS (tanpa tema warna mencolok) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts untuk profesional look -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa; /* abu muda lembut */
            color: #212529;
        }
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
        }
        .navbar-brand {
            font-weight: 600;
            color: #212529;
        }
        .navbar-brand:hover {
            color: #0d6efd;
        }
        .card {
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            background-color: #fff;
        }
        .btn {
            border-radius: 0.375rem;
        }
        table th {
            background-color: #f1f3f5;
            font-weight: 600;
        }
        .container {
            max-width: 960px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('mahasiswa.index') }}">SIMADA</a>
  </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
