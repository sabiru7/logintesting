<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Surat Al-Qur'an</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { 
      background: linear-gradient(135deg, #0f9d58, #00695c);
      font-family: 'Segoe UI', sans-serif; 
      color: #333;
    }

    /* SIDEBAR */
    .sidebar {
      min-height: 100vh;
      background: #064e3b;
      color: #fff;
      border-radius: 0 12px 12px 0;
      padding: 1.5rem 1rem;
    }
    .sidebar h4 {
      font-weight: bold;
      margin-bottom: 2rem;
    }
    .sidebar .nav-link {
      font-weight: 500;
      color: #fff;
      margin-bottom: .5rem;
      border-radius: 8px;
      padding: .6rem .8rem;
      display: flex;
      align-items: center;
      transition: 0.3s;
    }
    .sidebar .nav-link span {
      margin-left: .5rem;
    }
    .sidebar .nav-link:hover {
      background: #0d6e54;
      color: #fff;
    }
    .sidebar .nav-link.active {
      background: #ff9800 !important;
      color: #fff !important;
    }

    /* CARD SURAH */
    .card-surah { 
      background: #fff; 
      border-radius: 12px; 
      box-shadow: 0 6px 18px rgba(0,0,0,0.1); 
      margin-bottom: 1rem; 
      padding: 1rem;
      opacity:0; 
      transform: translateY(20px); 
      transition: all 0.4s ease-in-out; 
      cursor: pointer;
      border-left: 6px solid #4caf50;
    }
    .card-surah.show { opacity:1; transform: translateY(0); }
    .card-surah:hover { 
      transform: translateY(-5px) scale(1.02); 
      box-shadow:0 10px 25px rgba(0,0,0,0.15); 
      border-left: 6px solid #ff9800;
    }

    /* BUTTON */
    .btn-primary { 
      background-color:#4caf50; 
      border:none; 
      border-radius: 8px;
      font-weight: 500;
    }
    .btn-primary:hover { background-color:#388e3c; }

    /* MODAL */
    .modal-content { border-radius: 12px; }
    .modal-header { 
      background: #4caf50; 
      color: white; 
      border-radius: 12px 12px 0 0; 
    }
    .modal-body { max-height:70vh; overflow-y:auto; padding: 20px; background: #fafafa; }
    .ayat { 
      padding:1rem; 
      border-radius:8px; 
      background: #fff;
      margin-bottom: 1rem;
      border-left: 5px solid #ff9800;
      box-shadow: 0 3px 8px rgba(0,0,0,0.05);
    }
    .ayat p { margin: 5px 0; }
    .ayat:hover { background:#fff8e1; }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">

    <!-- SIDEBAR -->
    <aside class="col-md-3 col-lg-2 sidebar">
      <h4>🌙 MasyaAllah</h4>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" 
             class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            🏠 <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('api.index') }}" 
             class="nav-link {{ request()->routeIs('api.index') ? 'active' : '' }}">
            📖 <span>Al-Qur'an</span>
          </a>
        </li>
        <li>
          <a href="{{ route('profile') }}" 
             class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
            ⚙️ <span>Pengaturan</span>
          </a>
        </li>
      </ul>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="col-md-9 col-lg-10 py-4">
      <h2 class="mb-4 fw-bold text-center text-white">📖 Daftar Surat Al-Qur'an</h2>
      
      <!-- SEARCH BAR -->
      <div class="input-group mb-4 shadow-sm">
        <input type="text" id="searchInput" class="form-control rounded-start" placeholder="🔍 Cari surat berdasarkan nama atau arti...">
        <button class="btn btn-primary">Cari</button>
      </div>

      <div id="surah-list" class="row g-3"></div>
    </main>

  </div>
</div>

<!-- MODAL DETAIL SURAH -->
<div class="modal fade" id="surahModal" tabindex="-1" aria-labelledby="surahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="surahModalLabel">Detail Surat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body" id="surah-detail"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- SCRIPT -->
<script>
const baseUrl = 'https://equran.id/api/v2/surat';
let allSurahs = [];

async function fetchSurahs() {
  try {
    const response = await fetch(baseUrl);
    const data = await response.json();
    if (data.code === 200) {
      allSurahs = data.data;
      renderSurahs(allSurahs);
    } else {
      alert('Gagal memuat data surat.');
    }
  } catch (error) {
    console.error('Terjadi kesalahan:', error);
    alert('Terjadi kesalahan saat memuat data.');
  }
}

function renderSurahs(surahs) {
  const surahList = document.getElementById('surah-list');
  surahList.innerHTML = '';
  if(surahs.length === 0) {
    surahList.innerHTML = `<p class="text-center text-light">Surat tidak ditemukan.</p>`;
    return;
  }
  surahs.forEach((surah, index) => {
    const col = document.createElement('div');
    col.classList.add('col-md-4');
    col.innerHTML = `
      <div class="card-surah" onclick="showSurahDetail(${surah.nomor})">
        <h5 class="fw-bold mb-1">${surah.namaLatin}</h5>
        <small class="text-muted">Surah ${surah.nomor} | ${surah.arti}</small>
      </div>
    `;
    surahList.appendChild(col);
    setTimeout(() => {
      col.querySelector('.card-surah').classList.add('show');
    }, index * 60);
  });
}

async function showSurahDetail(nomor) {
  try {
    const response = await fetch(`https://equran.id/api/v2/surat/${nomor}`);
    const result = await response.json();
    if(result.code === 200) {
      const surah = result.data;
      let ayatHTML = '';
      surah.ayat.forEach(a => {
        ayatHTML += `
          <div class="ayat">
            <p class="text-end fs-4">${a.teksArab}</p>
            <p><em>${a.teksLatin}</em></p>
            <p>${a.teksIndonesia}</p>
          </div>
        `;
      });
      const detail = `
        <h4 class="text-center mb-3">${surah.namaLatin} (${surah.nama})</h4>
        <p class="text-center text-muted">Nomor: ${surah.nomor} | Arti: ${surah.arti} | Jumlah Ayat: ${surah.jumlahAyat} | Tempat Turun: ${surah.tempatTurun}</p>
        <hr>
        ${ayatHTML}
      `;
      document.getElementById('surah-detail').innerHTML = detail;
      const modal = new bootstrap.Modal(document.getElementById('surahModal'));
      modal.show();
    } else {
      alert('Gagal memuat detail surat.');
    }
  } catch(err) {
    console.error(err);
    alert('Terjadi kesalahan saat memuat detail surat.');
  }
}

document.getElementById('searchInput').addEventListener('input', function(e) {
  const keyword = e.target.value.toLowerCase();
  const filtered = allSurahs.filter(s => 
    s.namaLatin.toLowerCase().includes(keyword) ||
    s.arti.toLowerCase().includes(keyword)
  );
  renderSurahs(filtered);
});

fetchSurahs();
</script>
</body>
</html>
