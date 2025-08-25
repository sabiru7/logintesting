<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Saya</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f8f9fa;
    }
    .avatar-container {
      display: flex;
      justify-content: center;
      margin-bottom: 2rem;
    }
    .avatar {
      width: 180px;
      height: 180px;
      object-fit: cover;
      border-radius: 50%;
      border: 5px solid #0d6efd;
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .avatar:hover {
      transform: scale(1.05);
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold text-primary" href="{{ route('dashboard') }}">MyApp</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div id="mainNav" class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Laporan</a></li>
          <li class="nav-item"><a class="nav-link active" href="{{ route('profile') }}">Profil</a></li>
        </ul>

        <div class="d-flex align-items-center gap-3">
          <div class="d-none d-md-block text-muted small">
            Hai, <span class="fw-semibold text-dark">{{ Auth::user()->name }}</span>
          </div>
          </button>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </nav>

  <!-- MAIN -->
  <main class="container py-5">
    <!-- Foto Profil Tengah -->
    <div class="avatar-container">
      <img 
        src="{{ isset($profile) && $profile->avatar ? asset('storage/' . $profile->avatar) : 'https://via.placeholder.com/180' }}" 
        alt="Avatar" 
        class="avatar"
      >
    </div>

    <!-- Card Profil -->
    <div class="card text-center p-4 mx-auto" style="max-width: 600px;">
      <h3 class="fw-bold text-dark">{{ isset($user) ? $user->name : Auth::user()->name }}</h3>
      <p class="text-muted">{{ isset($user) ? $user->email : Auth::user()->email }}</p>

      <!-- Info tambahan -->
      <div class="row mt-4 text-center">
        <div class="col-md-4 mb-3">
          <div class="p-3 border rounded bg-light">
            <p class="small text-muted mb-1">Status</p>
            <p class="fw-semibold">{{ isset($profile) && $profile->status ? $profile->status : 'Aktif' }}</p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="p-3 border rounded bg-light">
            <p class="small text-muted mb-1">Tanggal Daftar</p>
            <p class="fw-semibold">{{ isset($user) && $user->created_at ? $user->created_at->format('d M Y') : '-' }}</p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="p-3 border rounded bg-light">
            <p class="small text-muted mb-1">Terakhir Login</p>
            <p class="fw-semibold">{{ isset($user) && $user->last_login_at ? \Carbon\Carbon::parse($user->last_login_at)->format('d M Y H:i') : '-' }}</p>
          </div>
        </div>
      </div>

      <!-- Tombol Aksi -->
      <div class="mt-4 d-flex justify-content-center gap-2">
        <a href="{{ route('pengaturan') }}" class="btn btn-primary">Edit Profil</a>
        <a href="{{ route('pengaturan') }}" class="btn btn-warning">Ubah Password</a>
      </div>
    </div>
  </main>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
