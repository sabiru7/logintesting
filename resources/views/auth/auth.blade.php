<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind (untuk animasi & efek kecil) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Animasi fade in */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.8s ease-in-out;
        }

        /* Background gradasi */
        body {
            background: linear-gradient(135deg, #3b82f6, #6366f1, #ec4899);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Rapikan tab biar lebih halus */
        .nav-tabs .nav-link {
            border: none;
            border-bottom: 2px solid transparent;
            color: #4b5563;
            font-weight: 600;
        }
        .nav-tabs .nav-link.active {
            color: #2563eb;
            border-color: #2563eb;
        }
    </style>
</head>
<body>

    <div class="bg-white shadow-2xl rounded-3 p-4 w-100 animate-fadeIn" style="max-width: 500px;">
        <h2 class="text-center fw-bold text-gray-700 mb-4">🔑 Authentication</h2>

        <!-- Pesan sukses/error -->
        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif
        @error('login_error')
            <div class="alert alert-danger text-center">{{ $message }}</div>
        @enderror

        <!-- Tabs -->
        <ul class="nav nav-tabs justify-content-center mb-3" id="authTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active px-4 py-2" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button">Login</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 py-2" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button">Register</button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-3" id="authTabContent">

            <!-- LOGIN FORM -->
            <div class="tab-pane fade show active" id="login" role="tabpanel">
                <form action="{{ route('login') }}" method="POST" class="space-y-3">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control rounded-3 shadow-sm" required value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control rounded-3 shadow-sm" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-3 py-2 hover:scale-105 transition-transform duration-200">Login</button>
                </form>
            </div>

            <!-- REGISTER FORM -->
            <div class="tab-pane fade" id="register" role="tabpanel">
                <form action="{{ route('register') }}" method="POST" class="space-y-3">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama</label>
                        <input type="text" name="name" class="form-control rounded-3 shadow-sm" required value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control rounded-3 shadow-sm" required value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control rounded-3 shadow-sm" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control rounded-3 shadow-sm" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100 rounded-3 py-2 hover:scale-105 transition-transform duration-200">Register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
