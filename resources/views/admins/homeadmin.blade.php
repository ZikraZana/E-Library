<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark bg-dark px-3">
    <span class="navbar-brand mb-0 h1">Perpustakaan Admin</span>
    <a href="logout.html" class="btn btn-outline-light">Logout</a>
  </nav>

  <div class="container mt-4">
    <h3>Selamat datang, Admin!</h3>
    <p>Silakan pilih menu di bawah untuk mengelola sistem perpustakaan:</p>

    <div class="row g-3 mt-3">
      <div class="col-md-4">
        <a href="daftar-peminjaman.html" class="btn btn-primary w-100">📚 Daftar Peminjaman</a>
      </div>
      <div class="col-md-4">
        <a href="kelola-peminjaman.html" class="btn btn-success w-100">✅ Kelola Peminjaman</a>
      </div>
      <div class="col-md-4">
        <a href="kelola-buku.html" class="btn btn-warning w-100">📝 Kelola Buku</a>
      </div>
      <div class="col-md-4">
        <a href="tambah-buku.html" class="btn btn-info w-100">➕ Tambah Buku Baru</a>
      </div>
      <div class="col-md-4">
        <a href="kelola-user.html" class="btn btn-secondary w-100">👤 Kelola Pengguna</a>
      </div>
    </div>
  </div>

</body>
</html>
