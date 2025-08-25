<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page Simpel</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
      <!-- Navbar Brand -->
      <a class="navbar-brand text-primary fw-bold" href="{{ route('auth') }}">Login</a>

      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
          <li class="nav-item">
            <a class="btn btn-primary text-white px-4" href="{{ route('auth') }}">Sign Up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-center px-4">
    <div>
      <h1 class="text-4xl md:text-6xl font-bold mb-4">Selamat Datang di login</h1>
      <p class="text-lg md:text-xl mb-6">Solusi terbaik untuk kebutuhan digital Anda.</p>
      <a href="{{ route('auth') }}" class="btn btn-light text-blue-600 fw-bold px-4 py-2">Mulai Sekarang</a>
    </div>
  </section>

  <!-- Features Section -->
  <section class="container py-5">
    <div class="text-center mb-5">
      <h2 class="text-3xl font-bold">Fitur Unggulan</h2>
      <p class="text-gray-600">Kenapa memilih kami?</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-xl font-semibold mb-2">Cepat</h3>
          <p>Layanan kami dirancang agar Anda bisa lebih hemat waktu.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-xl font-semibold mb-2">Mudah</h3>
          <p>Antarmuka sederhana dengan pengalaman pengguna terbaik.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-xl font-semibold mb-2">Aman</h3>
          <p>Kami menjamin keamanan data Anda dengan teknologi terbaru.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2025 MyBrand. All rights reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
