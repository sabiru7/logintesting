<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil | MasyaAllah</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg,#065f46,#15803d,#16a34a);
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
      display: flex;
      color: #1f2937;
    }

    /* === SIDEBAR (samain kayak dashboard) === */
    .sidebar {
      width: 240px;
      min-height: 100vh;
      background: #043927;
      padding: 1rem 0;
      box-shadow: 2px 0 8px rgba(0,0,0,0.25);
      position: fixed;
      top: 0;
      left: 0;
      display: flex;
      flex-direction: column;
    }
    .sidebar .brand {
      font-size: 1.4rem;
      font-weight: 700;
      color: #facc15;
      text-align: center;
      margin-bottom: 2rem;
    }
    .sidebar nav {
      flex-grow: 1;
    }
    .sidebar .nav-link {
      color: #e0f2f1;
      font-weight: 500;
      padding: 12px 20px;
      display: flex;
      align-items: center;
      gap: 12px;
      border-radius: 8px;
      margin: 6px 12px;
      transition: all 0.3s ease;
      font-size: 15px;
    }
    .sidebar .nav-link span {
      flex-grow: 1;
    }
    .sidebar .nav-link:hover {
      background: #00695c;
      color: #fff;
    }
    .sidebar .nav-link.active {
      background: #d97706;
      color: #fff;
      font-weight: 600;
    }

    /* === CONTENT === */
    .content {
      margin-left: 240px;
      padding: 2rem;
      width: calc(100% - 240px);
    }

    /* === CARD === */
    .card {
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.12);
      border: none;
    }

    /* === AVATAR === */
    .avatar-container {
      text-align: center;
      margin-bottom: 1.5rem;
    }
    .avatar {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid #d97706;
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
      transition: transform 0.3s;
    }
    .avatar:hover {
      transform: scale(1.05);
    }

    /* === INFO BOX === */
    .info-box {
      background: #fff8e1;
      border-radius: 10px;
      padding: 1rem;
      text-align: center;
      border: 1px solid #ffe082;
      box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    }
    .info-box .title {
      font-size: 0.85rem;
      color: #6b7280;
    }
    .info-box .value {
      font-weight: 700;
      color: #0f9d58;
    }

    /* === BUTTONS === */
    .btn-primary {
      background-color: #d97706;
      border: none;
    }
    .btn-primary:hover {
      background-color: #b45309;
    }
    .btn-warning {
      background-color: #facc15;
      border: none;
      color: #000;
    }
    .btn-warning:hover {
      background-color: #eab308;
      color: #000;
    }
  </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
  <div class="brand">🌙 MasyaAllah</div>
  <nav class="nav flex-column">
    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
      🏠 <span>Dashboard</span>
    </a>
    <a href="{{ route('api.index') }}" class="nav-link {{ request()->routeIs('api.index') ? 'active' : '' }}">
      📖 <span>Al-Qur'an</span>
    </a>
    <a href="{{ route('profile') }}" class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
      ⚙️ <span>Pengaturan</span>
    </a>
  </nav>
</div>

<!-- CONTENT -->
<div class="content">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-white">Profil</h4>
    <div class="d-flex align-items-center gap-3 small text-white">
      Ramadan Kareem, <span class="fw-semibold text-warning">{{ Auth::user()->name }}</span> ✨
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-warning btn-sm">Logout</button>
      </form>
    </div>
  </div>

  <!-- Profile Card -->
  <div class="card p-4 text-center">
    <div class="avatar-container">
      <img src="{{ isset($profile) && $profile->avatar ? asset('storage/' . $profile->avatar) : 'https://via.placeholder.com/160' }}" class="avatar" alt="avatar">
    </div>
    <h3 class="fw-bold text-success">{{ isset($user) ? $user->name : Auth::user()->name }}</h3>
    <p class="text-muted">{{ isset($user) ? $user->email : Auth::user()->email }}</p>
  </div>

  <!-- Info Boxes -->
  <div class="row g-3 mt-2">
    <div class="col-md-4">
      <div class="info-box">
        <p class="title">Status</p>
        <p class="value">{{ isset($profile) && $profile->status ? $profile->status : 'Aktif' }}</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="info-box">
        <p class="title">Tanggal Daftar</p>
        <p class="value">{{ isset($user) && $user->created_at ? $user->created_at->format('d M Y') : '-' }}</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="info-box">
        <p class="title">Terakhir Login</p>
        <p class="value">{{ isset($user) && $user->last_login_at ? \Carbon\Carbon::parse($user->last_login_at)->format('d M Y H:i') : '-' }}</p>
      </div>
    </div>
  </div>

  <!-- Actions -->
  <div class="card p-4 mt-4 text-center">
    <h5 class="fw-semibold mb-3 text-warning">⚡ Aksi Profil</h5>
    <div class="d-flex justify-content-center gap-2 flex-wrap">
      <a href="{{ route('pengaturan') }}" class="btn btn-primary">✏️ Edit Profil</a>
      <a href="{{ route('pengaturan') }}" class="btn btn-warning">🔒 Ubah Password</a>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    