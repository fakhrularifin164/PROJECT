<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pengguna</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" rel="stylesheet">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
      min-height: 100vh;
      padding: 32px 24px;
    }

    .glass-card {
      background: rgba(255,255,255,0.06);
      border: 0.5px solid rgba(255,255,255,0.15);
      border-radius: 16px;
      padding: 28px;
      backdrop-filter: blur(12px);
      max-width: 1000px;
      margin: 0 auto;
    }

    .page-title {
      font-size: 20px;
      font-weight: 500;
      color: #e2e8f8;
      margin-bottom: 6px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .page-title i { font-size: 22px; color: #7c9ef5; }

    .page-sub {
      font-size: 13px;
      color: rgba(200,210,240,0.55);
      margin-bottom: 24px;
    }

    .tbl-wrap {
      border-radius: 10px;
      overflow: hidden;
      border: 0.5px solid rgba(255,255,255,0.1);
      margin-bottom: 20px;
    }

    table { width: 100%; border-collapse: collapse; table-layout: fixed; }

    thead th {
      background: rgba(255,255,255,0.08);
      color: rgba(200,210,240,0.7);
      font-size: 12px;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.04em;
      padding: 12px 14px;
      text-align: left;
    }

    thead th:last-child { width: 130px; }

    tbody tr {
      border-top: 0.5px solid rgba(255,255,255,0.06);
      transition: background 0.15s;
    }

    tbody tr:hover { background: rgba(255,255,255,0.05); }

    tbody td {
      padding: 12px 14px;
      font-size: 13px;
      color: #d0d8f0;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    .badge-no {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 24px;
      height: 24px;
      border-radius: 6px;
      background: rgba(124,158,245,0.18);
      color: #7c9ef5;
      font-size: 11px;
      font-weight: 500;
    }

    .avatar {
      width: 28px; height: 28px;
      border-radius: 50%;
      background: rgba(124,158,245,0.25);
      color: #a0b8fc;
      font-size: 10px;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-right: 8px;
      vertical-align: middle;
    }

    .btn-edit {
      background: rgba(250,199,117,0.15);
      color: #fac775;
      border: 0.5px solid rgba(250,199,117,0.3);
      border-radius: 6px;
      font-size: 12px;
      padding: 5px 10px;
      cursor: pointer;
      margin-right: 6px;
      transition: background 0.15s;
    }
    .btn-edit:hover { background: rgba(250,199,117,0.28); }

    .btn-del {
      background: rgba(226,75,74,0.15);
      color: #f09595;
      border: 0.5px solid rgba(226,75,74,0.3);
      border-radius: 6px;
      font-size: 12px;
      padding: 5px 10px;
      cursor: pointer;
      transition: background 0.15s;
    }
    .btn-del:hover { background: rgba(226,75,74,0.28); }

    .btn-tambah {
      background: rgba(124,158,245,0.18);
      color: #a0b8fc;
      border: 0.5px solid rgba(124,158,245,0.35);
      border-radius: 8px;
      font-size: 13px;
      padding: 9px 18px;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: background 0.15s;
    }
    .btn-tambah:hover { background: rgba(124,158,245,0.3); }

    /* Modal */
    .modal-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.6);
      align-items: center;
      justify-content: center;
      z-index: 100;
    }
    .modal-overlay.active { display: flex; }

    .modal-box {
      background: #1a2240;
      border: 0.5px solid rgba(255,255,255,0.12);
      border-radius: 14px;
      padding: 24px;
      width: 420px;
      max-width: 92vw;
    }

    .modal-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .modal-title { font-size: 15px; font-weight: 500; color: #e2e8f8; }

    .btn-close-modal {
      background: none; border: none;
      color: rgba(200,210,240,0.5);
      font-size: 20px; cursor: pointer; line-height: 1;
    }

    .form-group { margin-bottom: 14px; }

    .form-label {
      font-size: 12px;
      color: rgba(200,210,240,0.6);
      margin-bottom: 5px;
      display: block;
    }

    .form-input {
      width: 100%;
      background: rgba(255,255,255,0.06);
      border: 0.5px solid rgba(255,255,255,0.15);
      border-radius: 8px;
      padding: 9px 12px;
      font-size: 13px;
      color: #d0d8f0;
      outline: none;
      font-family: 'Segoe UI', sans-serif;
      transition: border-color 0.15s;
    }
    .form-input:focus { border-color: rgba(124,158,245,0.6); }
    .form-input::placeholder { color: rgba(200,210,240,0.3); }

    .modal-footer {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
      margin-top: 20px;
    }

    .btn-batal {
      background: rgba(255,255,255,0.06);
      color: rgba(200,210,240,0.7);
      border: 0.5px solid rgba(255,255,255,0.12);
      border-radius: 8px;
      padding: 8px 16px;
      font-size: 13px;
      cursor: pointer;
    }

    .btn-simpan {
      background: rgba(124,158,245,0.25);
      color: #a0b8fc;
      border: 0.5px solid rgba(124,158,245,0.4);
      border-radius: 8px;
      padding: 8px 16px;
      font-size: 13px;
      cursor: pointer;
    }
    .btn-simpan:hover { background: rgba(124,158,245,0.4); }

    /* Confirm Dialog */
    .confirm-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.55);
      align-items: center;
      justify-content: center;
      z-index: 200;
    }
    .confirm-overlay.active { display: flex; }

    .confirm-box {
      background: #1a2240;
      border: 0.5px solid rgba(255,255,255,0.12);
      border-radius: 12px;
      padding: 28px 24px;
      width: 320px;
      text-align: center;
    }

    .confirm-icon { font-size: 36px; color: #f09595; margin-bottom: 12px; }
    .confirm-msg { font-size: 14px; color: #d0d8f0; margin-bottom: 20px; }
    .confirm-btns { display: flex; gap: 10px; justify-content: center; }
  </style>
</head>
<body>

<div class="glass-card">
  <div class="page-title">
    <i class="ti ti-database"></i>
    Data Pengguna
  </div>
  <p class="page-sub">Manajemen data pengguna &middot; <span id="jml">0</span> entri</p>

  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th style="width:48px">No</th>
          <th>Username</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Email</th>
          <th>No HP</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="bodyTabel"></tbody>
    </table>
  </div>

  <button class="btn-tambah" onclick="tampilModalTambah()">
    <i class="ti ti-plus"></i> Tambah Data
  </button>
</div>

<!-- Modal Form -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal-box">
    <div class="modal-header">
      <span class="modal-title" id="judulModal">Tambah Data</span>
      <button class="btn-close-modal" onclick="tutupModal()" aria-label="Tutup">&times;</button>
    </div>
    <input type="hidden" id="editIndex" value="-1">
    <div class="form-group">
      <label class="form-label">Username</label>
      <input class="form-input" id="inputUsername" type="text" placeholder="Masukkan username">
    </div>
    <div class="form-group">
      <label class="form-label">Nama</label>
      <input class="form-input" id="inputNama" type="text" placeholder="Nama lengkap">
    </div>
    <div class="form-group">
      <label class="form-label">Alamat</label>
      <input class="form-input" id="inputAlamat" type="text" placeholder="Alamat">
    </div>
    <div class="form-group">
      <label class="form-label">Email</label>
      <input class="form-input" id="inputEmail" type="email" placeholder="email@contoh.com">
    </div>
    <div class="form-group">
      <label class="form-label">No HP</label>
      <input class="form-input" id="inputNoHP" type="text" placeholder="08xxxxxxxxxx">
    </div>
    <div class="modal-footer">
      <button class="btn-batal" onclick="tutupModal()">Batal</button>
      <button class="btn-simpan" onclick="simpanData()">Simpan</button>
    </div>
  </div>
</div>

<!-- Confirm Delete -->
<div class="confirm-overlay" id="confirmOverlay">
  <div class="confirm-box">
    <div class="confirm-icon"><i class="ti ti-trash"></i></div>
    <p class="confirm-msg">Yakin ingin menghapus data ini?</p>
    <div class="confirm-btns">
      <button class="btn-batal" onclick="tutupConfirm()">Batal</button>
      <button class="btn-del" id="btnConfirmDel">Hapus</button>
    </div>
  </div>
</div>

<script>
  let data = [
    { username: "Jandaank5", nama: "Lely Kurnia Eli", alamat: "Citerep", email: "akujanda@gmail.com", nohp: "0817228227" },
    { username: "cutans", nama: "Sutan", alamat: "Balaraja", email: "cutans@gmail.com", nohp: "081319177907" },
    { username: "BujangLanang", nama: "Brian", alamat: "Bekasi", email: "dudaanak5@gmail.com", nohp: "081377727287" },
    { username: "HetiAjayakan", nama: "Heti Kusendang", alamat: "Bandung Raya", email: "hetiaja@gmail.com", nohp: "081319188608" }
  ];

  let deletePending = -1;

  function initials(nama) {
    return nama.split(' ').slice(0, 2).map(w => w[0] || '').join('').toUpperCase();
  }

  function renderTabel() {
    const tbody = document.getElementById('bodyTabel');
    document.getElementById('jml').textContent = data.length;
    tbody.innerHTML = '';
    data.forEach((row, i) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td><span class="badge-no">${i + 1}</span></td>
        <td style="font-weight:500;color:#a0b8fc">${row.username}</td>
        <td><span class="avatar">${initials(row.nama)}</span>${row.nama}</td>
        <td>${row.alamat}</td>
        <td style="color:rgba(200,210,240,0.7)">${row.email}</td>
        <td>${row.nohp}</td>
        <td>
          <button class="btn-edit" onclick="tampilModalEdit(${i})"><i class="ti ti-edit"></i> Edit</button>
          <button class="btn-del" onclick="konfirmHapus(${i})"><i class="ti ti-trash"></i></button>
        </td>`;
      tbody.appendChild(tr);
    });
  }

  function tampilModalTambah() {
    document.getElementById('judulModal').textContent = 'Tambah Data';
    document.getElementById('editIndex').value = -1;
    ['Username', 'Nama', 'Alamat', 'Email', 'NoHP'].forEach(f => document.getElementById('input' + f).value = '');
    document.getElementById('modalOverlay').classList.add('active');
  }

  function tampilModalEdit(i) {
    document.getElementById('judulModal').textContent = 'Edit Data';
    document.getElementById('editIndex').value = i;
    const row = data[i];
    document.getElementById('inputUsername').value = row.username;
    document.getElementById('inputNama').value = row.nama;
    document.getElementById('inputAlamat').value = row.alamat;
    document.getElementById('inputEmail').value = row.email;
    document.getElementById('inputNoHP').value = row.nohp;
    document.getElementById('modalOverlay').classList.add('active');
  }

  function tutupModal() {
    document.getElementById('modalOverlay').classList.remove('active');
  }

  function simpanData() {
    const idx = parseInt(document.getElementById('editIndex').value);
    const baru = {
      username: document.getElementById('inputUsername').value,
      nama: document.getElementById('inputNama').value,
      alamat: document.getElementById('inputAlamat').value,
      email: document.getElementById('inputEmail').value,
      nohp: document.getElementById('inputNoHP').value
    };
    if (idx === -1) data.push(baru);
    else data[idx] = baru;
    tutupModal();
    renderTabel();
  }

  function konfirmHapus(i) {
    deletePending = i;
    document.getElementById('confirmOverlay').classList.add('active');
    document.getElementById('btnConfirmDel').onclick = function () {
      data.splice(deletePending, 1);
      tutupConfirm();
      renderTabel();
    };
  }

  function tutupConfirm() {
    document.getElementById('confirmOverlay').classList.remove('active');
  }

  renderTabel();
</script>
</body>
</html>