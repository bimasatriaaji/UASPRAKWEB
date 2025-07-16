<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Masjid Al-Hikmah</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">

    <style>
    body {
        font-family: 'Quicksand', sans-serif;
        background: url("{{ asset('images/mjd.jpg') }}") no-repeat center center fixed;
        background-size: cover;
        backdrop-filter: blur(3px);
    }

        .login-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            padding: 3rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .logo {
            width: 90px;
        }

        .brand-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: #198754;
        }

        .btn-success {
            background-color: #198754;
            border-color: #198754;
        }

        .btn-success:hover {
            background-color: #145a3e;
            border-color: #145a3e;
        }

        .register-link {
            color: #198754;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 login-card">
            <div class="text-center mb-4">
                <img src="{{ asset('images/masjid.png') }}" class="logo mb-2" alt="Masjid Logo">
                <div class="brand-title">Masjid Al-Hikmah</div>
                <small class="text-muted">Sistem Informasi Donasi & Zakat</small>
            </div>

            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required autofocus>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                           required>
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Ingat Saya</label>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    <i class="bi bi-door-open me-1"></i> Masuk
                </button>
            </form>

            <div class="text-center mt-3">
                <span>Belum punya akun?</span>
                <a href="{{ route('register') }}" class="register-link">Daftar di sini</a>
            </div>

            <div class="text-center mt-3">
                <small class="text-muted">© {{ date('Y') }} Masjid Al-Hikmah</small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
