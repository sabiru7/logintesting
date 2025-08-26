<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | MasyaAllah Qur’an Digital</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg,#065f46,#15803d,#16a34a);
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
      color: #1f2937;
      display: flex;
    }

    /* === SIDEBAR (sama seperti sebelumnya) === */
    .sidebar {
      width: 250px;
      min-height: 100vh;
      background: #064e3b;
      padding: 1.5rem 1rem;
      position: fixed;
      left: 0;
      top: 0;
    }
    .sidebar .brand {
      font-size: 1.5rem;
      font-weight: bold;
      color: #facc15;
      margin-bottom: 2rem;
      display: block;
      text-decoration: none;
    }
    .sidebar .nav-link {
      color: #e0f2f1;
      font-weight: 500;
      padding: 12px 16px;
      border-radius: 8px;
      margin-bottom: 8px;
      display: block;
      transition: 0.3s;
    }
    .sidebar .nav-link:hover {
      background: #065f46;
      color: #fff;
    }
    .sidebar .nav-link.active {
      background: #f97316;
      color: #fff;
      font-weight: 600;
    }

    /* === CONTENT === */
    .content {
      margin-left: 250px;
      padding: 2rem;
      flex-grow: 1;
    }

    /* === CARD === */
    .card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.08);
      margin-bottom: 1.5rem;
      border-top: 4px solid #d97706;
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.6s ease-in-out;
    }
    .card.show {
      opacity: 1;
      transform: translateY(0);
    }

    /* INFO BOX */
    .info-box {
      background: linear-gradient(135deg,#fef9c3,#fde68a);
      border:1px solid #fcd34d;
      border-radius:12px;
      padding:1.2rem;
      text-align:center;
      transition: transform 0.3s, box-shadow 0.3s;
      cursor:pointer;
    }
    .info-box:hover { transform: translateY(-6px); box-shadow:0 10px 25px rgba(0,0,0,0.1); }
    .info-box-icon { font-size:1.8rem; color:#d97706; margin-bottom:0.5rem; }

    /* BUTTONS */
    .btn-primary { background-color:#d97706; border:none; }
    .btn-primary:hover { background-color:#b45309; }
    .btn-success { background-color:#16a34a; border:none; }
    .btn-success:hover { background-color:#15803d; }
    .btn-warning { background-color:#facc15; border:none; color:#000; }
    .btn-warning:hover { background-color:#eab308; color:#000; }
  </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
  <a href="{{ route('dashboard') }}" class="brand">🌙 MasyaAllah</a>
  <nav>
    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">🏠 Dashboard</a>
    <a href="{{ route('api.index') }}" class="nav-link {{ request()->routeIs('api.index') ? 'active' : '' }}">📖 Al-Qur'an</a>
    <a href="{{ route('profile') }}" class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">⚙️ Pengaturan</a>
  </nav>
</div>

<!-- CONTENT -->
<div class="content">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold">Dashboard</h4>
    <div class="d-flex align-items-center gap-3 small">
      Assalamu’alaikum, <span class="fw-semibold text-warning">{{ auth()->user()->name }}</span> ✨
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
      </form>
    </div>
  </div>

  <!-- Welcome -->
  <div class="card p-4 text-center">
    <h1 class="fw-bold text-warning">🌙 MasyaAllah, {{ auth()->user()->name }}</h1>
    <p class="text-muted mt-2">Selamat datang kembali 👋 semoga Ramadhan ini penuh berkah ✨</p>
  </div>

  <!-- Statistik -->
  <div class="row mt-4 g-3">
    <div class="col-md-4">
      <div class="info-box">
        <div class="info-box-icon">✅</div>
        <p class="small text-muted mb-1">Status</p>
        <p class="fw-semibold">Aktif</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="info-box" data-counter="7">
        <div class="info-box-icon">🔔</div>
        <p class="small text-muted mb-1">Notifikasi</p>
        <p class="fw-semibold counter">0</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="info-box">
        <div class="info-box-icon">⏳</div>
        <p class="small text-muted mb-1">Terakhir Login</p>
        <p class="fw-semibold">{{ now()->format('d M Y H:i') }}</p>
      </div>
    </div>
  </div>

  <!-- Progress Membaca Qur’an -->
  <div class="card p-4 mt-4">
    <h5 class="fw-semibold mb-3">📖 Histori Qur’an</h5>
    <p class="mb-2">Surah terakhir yang kamu baca: <span class="fw-bold text-success">Al-Baqarah : 25</span></p>
    <div class="progress" style="height: 20px;">
      <div class="progress-bar bg-warning" role="progressbar" style="width: 40%">40%</div>
    </div>
  </div>

  <!-- Aksi Cepat -->
  <div class="card p-4 mt-4 text-center">
    <h5 class="fw-semibold mb-3">⚡ Aksi Cepat</h5>
    <div class="d-flex justify-content-center gap-2 flex-wrap">
      <a href="#" class="btn btn-primary">📥 Tambah Data</a>
      <a href="#" class="btn btn-success">📊 Lihat Laporan</a>
      <a href="{{ route('profile') }}" class="btn btn-warning">⚙️ Pengaturan</a>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.card').forEach((card, index) => {
    setTimeout(() => { card.classList.add('show'); }, index * 150);
  });
  // Counter
  document.querySelectorAll('.counter').forEach(counter => {
    let target = +counter.parentElement.dataset.counter;
    let count = 0;
    let step = target > 0 ? Math.ceil(target/50) : 1;
    let interval = setInterval(() => {
      count += step;
      if(count >= target){ count = target; clearInterval(interval); }
      counter.textContent = count;
    }, 30);
  });
});
</script>
</body>
</html>
