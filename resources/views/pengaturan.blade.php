<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengaturan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind (prefix tw-) -->
    <script>
      tailwind.config = {
        darkMode: 'class',
        prefix: 'tw-',
        theme: { extend: {} }
      }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
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
            <li class="nav-item"><a class="nav-link active" href="{{ route('pengaturan') }}">Pengaturan</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- MAIN -->
    <main class="container tw-py-6">
      <div class="row">
        
        <!-- Sidebar -->
        <aside class="col-md-3 mb-4">
          <div class="list-group tw-shadow-sm tw-rounded-lg">
            <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">🏠 Dashboard</a>
            <a href="#" class="list-group-item list-group-item-action">📊 Statistik</a>
            <a href="#" class="list-group-item list-group-item-action">📁 Data</a>
            <a href="{{ route('pengaturan') }}" class="list-group-item list-group-item-action active">⚙️ Pengaturan</a>
          </div>
        </aside>

        <!-- Konten utama -->
        <section class="col-md-9">
          <div class="card tw-shadow-sm tw-rounded-xl">
            <div class="card-body tw-p-6">
              <h1 class="tw-text-2xl tw-font-bold tw-text-slate-900">Pengaturan</h1>
              <p class="tw-text-slate-600 tw-mt-1">Kelola akun dan preferensi Anda</p>

              <!-- Logout Section -->
              <div class="tw-mt-5">
                <h5 class="fw-semibold tw-mb-3">Keluar dari Akun</h5>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="btn btn-danger">Logout</button>
                </form>
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
