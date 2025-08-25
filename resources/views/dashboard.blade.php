<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        darkMode: 'class',
        prefix: 'tw-', // prefix biar gak bentrok sama Bootstrap
        theme: {
          extend: {}
        }
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
            <li class="nav-item"><a class="nav-link active" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Laporan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">Profil</a></li>
          </ul>

          <!-- Profil singkat -->
          <div class="d-flex align-items-center gap-3">
            <div class="tw-hidden md:tw-block tw-text-sm tw-text-slate-600">
              Hai, <span class="tw-font-semibold tw-text-slate-900">{{ auth()->user()->name }}</span>
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

    <!-- MAIN CONTENT -->
    <main class="container tw-py-6">
      <div class="row">
        
        <!-- Sidebar -->
        <aside class="col-md-3 mb-4">
          <div class="list-group tw-shadow-sm tw-rounded-lg">
            <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action active">🏠 Dashboard</a>
            <a href="#" class="list-group-item list-group-item-action">📊 Statistik</a>
            <a href="#" class="list-group-item list-group-item-action">📁 Data</a>
            <a href="{{ route('pengaturan') }}" class="list-group-item list-group-item-action">⚙️ Pengaturan</a>
          </div>
        </aside>

        <!-- Konten utama -->
        <section class="col-md-9">
          <div class="card tw-shadow-sm tw-rounded-xl mb-4">
            <div class="card-body tw-p-6">
              <h1 class="tw-text-2xl tw-font-bold tw-text-slate-900">
                Halo, {{ auth()->user()->name }}
              </h1>
              <p class="tw-mt-1 tw-text-slate-600">Selamat datang kembali 👋</p>
            </div>
          </div>

          <!-- Statistik -->
          <div class="row g-3 mb-4">
            <div class="col-md-4">
              <div class="tw-rounded-lg tw-bg-white tw-shadow tw-p-4 border">
                <p class="tw-text-sm tw-text-slate-500">Status</p>
                <p class="tw-text-lg tw-font-semibold">Aktif</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="tw-rounded-lg tw-bg-white tw-shadow tw-p-4 border">
                <p class="tw-text-sm tw-text-slate-500">Notifikasi</p>
                <p class="tw-text-lg tw-font-semibold">5</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="tw-rounded-lg tw-bg-white tw-shadow tw-p-4 border">
                <p class="tw-text-sm tw-text-slate-500">Terakhir Login</p>
                <p class="tw-text-lg tw-font-semibold">{{ now()->format('d M Y H:i') }}</p>
              </div>
            </div>
          </div>

          <!-- Aksi Cepat -->
          <div class="card tw-shadow-sm tw-rounded-xl">
            <div class="card-body">
              <h5 class="fw-semibold">Aksi Cepat</h5>
              <div class="d-flex flex-wrap gap-2 tw-mt-3">
                <a href="#" class="btn btn-primary">Tambah Data</a>
                <a href="#" class="btn btn-success">Lihat Laporan</a>
                <a href="{{ route('pengaturan') }}" class="btn btn-warning">Pengaturan</a>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
