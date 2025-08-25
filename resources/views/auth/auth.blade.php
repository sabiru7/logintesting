<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind -->
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
    </style>
</head>
<body>

    <div class="bg-white shadow-2xl rounded-2xl w-full max-w-lg p-6 animate-fadeIn">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">🔑 Authentication</h2>

        <!-- Pesan sukses/error -->
        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif
        @error('login_error')
            <div class="alert alert-danger text-center">{{ $message }}</div>
        @enderror

        <!-- Tabs -->
        <ul class="nav nav-tabs flex justify-center mb-4 border-b-2" id="authTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active px-4 py-2 font-semibold" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button">Login</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 py-2 font-semibold" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button">Register</button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-3" id="authTabContent">

            <!-- LOGIN FORM -->
            <div class="tab-pane fade show active" id="login" role="tabpanel">
                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block mb-1 font-medium">Email</label>
                        <input type="email" name="email" class="form-control rounded-lg border-gray-300 focus:ring focus:ring-indigo-300" required value="{{ old('email') }}">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Password</label>
                        <input type="password" name="password" class="form-control rounded-lg border-gray-300 focus:ring focus:ring-indigo-300" required>
                    </div>
                    <button type="submit" class="w-full btn btn-primary rounded-lg py-2 hover:scale-105 transition-transform duration-200">Login</button>
                </form>
            </div>

            <!-- REGISTER FORM -->
            <div class="tab-pane fade" id="register" role="tabpanel">
                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block mb-1 font-medium">Nama</label>
                        <input type="text" name="name" class="form-control rounded-lg border-gray-300 focus:ring focus:ring-green-300" required value="{{ old('name') }}">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Email</label>
                        <input type="email" name="email" class="form-control rounded-lg border-gray-300 focus:ring focus:ring-green-300" required value="{{ old('email') }}">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Password</label>
                        <input type="password" name="password" class="form-control rounded-lg border-gray-300 focus:ring focus:ring-green-300" required>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control rounded-lg border-gray-300 focus:ring focus:ring-green-300" required>
                    </div>
                    <button type="submit" class="w-full btn btn-success rounded-lg py-2 hover:scale-105 transition-transform duration-200">Register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
