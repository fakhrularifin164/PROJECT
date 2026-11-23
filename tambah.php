<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat   = mysqli_real_escape_string($conn, $_POST['alamat']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $nohp     = mysqli_real_escape_string($conn, $_POST['nohp']);

    $sql = "INSERT INTO users (username, nama, alamat, email, nohp)
            VALUES ('$username', '$nama', '$alamat', '$email', '$nohp')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?pesan=Data berhasil ditambahkan!");
        exit;
    } else {
        $error = "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f0f4f8; }
    .box { background: #fff; border-radius: 10px; padding: 30px; margin-top: 40px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
  </style>
</head>
<body>
<div class="container">
  <div class="box" style="max-width:500px; margin:40px auto;">
    <h4 class="fw-bold mb-4">Tambah Data</h4>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <input type="text" name="alamat" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">No HP</label>
        <input type="text" name="nohp" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="index.php" class="btn btn-secondary ms-2">Batal</a>
    </form>
  </div>
</div>
</body>
</html>