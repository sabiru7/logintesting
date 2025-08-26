<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pengaturan Profil | MasyaAllah</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
/* ===== BODY ===== */
body {
  background: linear-gradient(135deg, #004d40, #00796b);
  font-family: 'Segoe UI', sans-serif;
  min-height: 100vh;
  color: #212121;
  display: flex;
}

/* ===== SIDEBAR ===== */
.sidebar {
  width: 240px;
  min-height: 100vh;
  background: #004d40;
  padding: 1rem 0;
  box-shadow: 2px 0 8px rgba(0,0,0,0.25);
  position: fixed;
  top: 0;
  left: 0;
}
.sidebar .brand {
  font-size: 1.3rem;
  font-weight: 700;
  color: #ffeb3b;
  text-align: center;
  margin-bottom: 2rem;
}
.sidebar .nav-link {
  color: #e0f2f1;
  font-weight: 500;
  padding: 12px 20px;
  display: flex;
  align-items: center;
  gap: 10px;
  border-radius: 8px;
  margin: 6px 12px;
  transition: 0.3s;
}
.sidebar .nav-link:hover {
  background: #00695c;
  color: #fff;
}
.sidebar .nav-link.active {
  background: #ff9800;
  color: #fff;
}

/* ===== CONTENT WRAPPER ===== */
.content {
  margin-left: 240px; /* kasih jarak biar nggak ketiban sidebar */
  padding: 2rem;
  width: calc(100% - 240px);
}

/* ===== CARD ===== */
.card {
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.12);
  padding: 2rem;
  background: #fff;
}

/* ===== AVATAR ===== */
.avatar-container {
  display: flex;
  justify-content: center;
  margin-bottom: 1.5rem;
}
.avatar {
  width: 160px;
  height: 160px;
  object-fit: cover;
  border-radius: 50%;
  border: 5px solid #ffeb3b;
  box-shadow: 0 6px 18px rgba(0,0,0,0.15);
  transition: transform 0.3s;
  cursor: pointer;
}
.avatar:hover {
  transform: scale(1.05);
}

/* ===== FORM ===== */
.form-label {
  font-weight: 500;
  color: #004d40;
}
.btn-primary {
  background-color: #00796b;
  border: none;
}
.btn-primary:hover {
  background-color: #004d40;
}
</style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
  <div class="brand">🌙 MasyaAllah</div>
  <nav class="nav flex-column">
    <a href="{{ route('dashboard') }}" class="nav-link">
      🏠 <span>Dashboard</span>
    </a>
    <a href="{{ route('api.index') }}" class="nav-link">
      📖 <span>Al-Qur'an</span>
    </a>
    <a href="{{ route('profile') }}" class="nav-link active">
      ⚙️ <span>Pengaturan</span>
    </a>
  </nav>
</div>

<!-- MAIN CONTENT -->
<div class="content">

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <div class="card">
    <h4 class="fw-bold mb-4 text-center text-success">Pengaturan Profil</h4>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <!-- AVATAR -->
      <div class="avatar-container">
        <label for="avatar">
          <img src="{{ isset($profile) && $profile->avatar ? asset('storage/'.$profile->avatar) : 'https://via.placeholder.com/160' }}" 
               alt="Avatar" 
               class="avatar" 
               id="avatarPreview" 
               title="Klik untuk ganti foto">
        </label>
        <input type="file" id="avatar" name="avatar" accept="image/*" class="d-none">
      </div>

      <!-- Nama -->
      <div class="mb-3">
        <label class="form-label" for="name">Nama</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
      </div>

      <!-- Password Baru -->
      <div class="mb-3">
        <label class="form-label" for="password">Password Baru</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti">
      </div>

      <!-- Konfirmasi Password -->
      <div class="mb-3">
        <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Ulangi password baru">
      </div>

      <button type="submit" class="btn btn-primary w-100">💾 Simpan Perubahan</button>
    </form>
  </div>
</div>

<script>
  // Preview avatar sebelum upload
  const avatarInput = document.getElementById('avatar');
  const avatarPreview = document.getElementById('avatarPreview');
  avatarInput.addEventListener('change', function() {
    const file = this.files[0];
    if(file) {
      const reader = new FileReader();
      reader.onload = e => avatarPreview.src = e.target.result;
      reader.readAsDataURL(file);
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
