<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaturan Profil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { background: #f8f9fa; }
    .avatar-container {
      display: flex;
      justify-content: center;
      margin-bottom: 2rem;
    }
    .avatar {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid #0d6efd;
      transition: transform 0.2s, box-shadow 0.2s;
      cursor: pointer;
    }
    .avatar:hover {
      transform: scale(1.05);
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
    }
    .card {
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
    }
    .form-label { font-weight: 500; }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="card p-4">
        <h4 class="fw-bold mb-4 text-center">Pengaturan Profil</h4>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- Avatar Preview -->
          <div class="avatar-container">
            <label for="avatar">
              <img 
                src="{{ isset($profile) && $profile->avatar ? asset('storage/' . $profile->avatar) : 'https://via.placeholder.com/150' }}" 
                alt="Avatar" 
                class="avatar" 
                id="avatarPreview"
                title="Klik untuk ganti foto"
              >
            </label>
            <input type="file" id="avatar" name="avatar" accept="image/*" class="d-none">
          </div>

          <!-- Nama -->
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
          </div>

          <!-- Password Baru -->
          <div class="mb-3">
            <label for="password" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengganti">
          </div>

          <!-- Konfirmasi Password -->
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password baru">
          </div>

          <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
        </form>
      </div>

    </div>
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
