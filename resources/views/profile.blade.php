<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Saya</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      prefix: 'tw-',
      theme: { extend: {} }
    }
  </script>
</head>
<body class="tw-bg-gradient-to-br tw-from-slate-50 tw-to-slate-100">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom tw-shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold text-primary" href="{{ route('dashboard') }}">MyApp</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
              aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div id="mainNav" class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Laporan</a></li>
          <li class="nav-item"><a class="nav-link active" href="#">Profil</a></li>
          
        </ul>

        <!-- Profil singkat -->
        <div class="d-flex align-items-center gap-3">
          <div class="tw-hidden md:tw-block tw-text-sm tw-text-slate-600">
            Hai, <span class="tw-font-semibold tw-text-slate-900">Budi Santoso</span>
          </div>

          <!-- Logout -->
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </nav>

  <!-- MAIN -->
  <main class="container tw-py-6">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <!-- Card Profil -->
        <div class="card tw-shadow-sm tw-rounded-xl">
          <div class="card-body tw-p-6 text-center">

            <!-- Foto Profil -->
       <img src="https://randomuser.me/api/portraits/men/32.jpg" 
     class="rounded-circle mb-3 border tw-mx-auto tw-block"
     alt="Foto Profil" width="100" height="100">
            <!-- Nama & Email -->
            <h3 class="tw-text-xl tw-font-bold tw-text-slate-900">Budi Santoso</h3>
            <p class="tw-text-slate-600">budi.santoso@example.com</p>

            <!-- Info tambahan -->
            <div class="row mt-4">
              <div class="col-md-4">
                <div class="p-3 border rounded tw-bg-slate-50">
                  <p class="tw-text-sm tw-text-slate-500">Status</p>
                  <p class="fw-semibold">Aktif</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="p-3 border rounded tw-bg-slate-50">
                  <p class="tw-text-sm tw-text-slate-500">Tanggal Daftar</p>
                  <p class="fw-semibold">15 Feb 2025</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="p-3 border rounded tw-bg-slate-50">
                  <p class="tw-text-sm tw-text-slate-500">Terakhir Login</p>
                  <p class="fw-semibold">25 Feb 2025 09:45</p>
                </div>
              </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-4">
              <a href="{{ route('pengaturan') }}" class="btn btn-primary">Edit Profil</a>
              <a href="{{ route('pengaturan') }}" class="btn btn-warning">Ubah Password</a>
            </div>

          </div>
        </div>

      </div>
    </div>
  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
