<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Donasi & Zakat Masjid Al-Hikmah') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7f6;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: #157347;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: bold;
        }

        .sidebar {
            background-color: #116a4d;
            min-height: 100vh;
            padding-top: 20px;
        }

        .sidebar a {
            color: #dee2e6;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px 10px;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #198754;
            color: #fff;
        }

        .active-link {
            background-color: #198754 !important;
            color: #fff !important;
            font-weight: 500;
        }

        .content {
            padding: 30px;
        }

        footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 1rem;
            color: #777;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-mosque me-2"></i>{{ config('app.name', 'Donasi & Zakat Masjid Al-Hikmah') }}
            </a>

            <div class="d-flex align-items-center">
                @auth
                    <span class="text-white me-3"><i class="bi bi-person-circle"></i> {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-light btn-sm">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Layout -->
    <div class="container-fluid">
        <div class="row">

            @auth
            <!-- Sidebar -->
            <div class="col-md-2 sidebar d-none d-md-block">
                <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active-link' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <a href="{{ route('donaturs.index') }}" class="{{ request()->is('donaturs*') ? 'active-link' : '' }}">
                    <i class="bi bi-person-lines-fill me-2"></i> Donatur
                </a>
                <a href="{{ route('donasis.index') }}" class="{{ request()->is('donasis*') ? 'active-link' : '' }}">
                    <i class="bi bi-wallet2 me-2"></i> Donasi
                </a>
                <a href="{{ route('zakats.index') }}" class="{{ request()->is('zakats*') ? 'active-link' : '' }}">
                    <i class="bi bi-cash-coin me-2"></i> Zakat
                </a>
                <a href="{{ route('profile.edit') }}" class="{{ request()->is('profile') ? 'active-link' : '' }}">
                    <i class="bi bi-person-circle me-2"></i> Profil
                </a>
            </div>
            <!-- Content -->
            <div class="col-md-10 content">
                @yield('content')
            </div>
            @else
            <!-- Full Content for Guests -->
            <div class="col-12 content">
                @yield('content')
            </div>
            @endauth

        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} Donasi & Zakat Masjid Al-Hikmah
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
