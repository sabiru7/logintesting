<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Al-Qur'an Digital</title>
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
      <a class="navbar-brand text-success fw-bold" href="{{ route('auth') }}">📖 Al-Qur'an Digital</a>

      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Fitur</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
          <li class="nav-item">
            <a class="btn btn-success text-white px-4" href="{{ route('auth') }}">Masuk</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="min-h-screen flex items-center justify-center bg-gradient-to-r from-green-500 to-emerald-600 text-white text-center px-4">
    <div>
      <h1 class="text-4xl md:text-6xl font-bold mb-4">Bismillahirrahmanirrahim</h1>
      <p class="text-lg md:text-xl mb-6">Aplikasi Al-Qur’an Digital dengan terjemahan & fitur modern.</p>
      <a href="{{ route('auth') }}" class="btn btn-light text-green-600 fw-bold px-4 py-2">Mulai Membaca</a>
    </div>
  </section>

  <!-- Features Section -->
  <section class="container py-6">
    <div class="text-center mb-6">
      <h2 class="text-3xl font-bold text-success">✨ Fitur Unggulan</h2>
      <p class="text-gray-600">Kenapa memilih aplikasi Qur’an ini?</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-xl font-semibold mb-2">📖 Baca Qur’an</h3>
          <p>Lengkap dengan terjemahan Bahasa Indonesia dan tafsir ringkas.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-xl font-semibold mb-2">🔍 Cari Surah/Ayat</h3>
          <p>Temukan ayat atau surah favoritmu dengan cepat dan mudah.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-xl font-semibold mb-2">🌙 Mode Malam</h3>
          <p>Baca lebih nyaman dengan dark mode untuk malam hari.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-success text-white text-center py-3">
    <p>&copy; 2025 Al-Qur'an Digital. Semua Hak Dilindungi.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
