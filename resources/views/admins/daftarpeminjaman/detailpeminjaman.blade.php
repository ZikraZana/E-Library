<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Detail Peminjaman</title>
  <style>
    body {
      background-color: #f4f6f8;
      font-family: 'Segoe UI', sans-serif;
    }
    .container {
      max-width: 600px;
      margin: 40px auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .field {
      margin-bottom: 20px;
    }
    .field label {
      font-weight: bold;
      display: block;
      margin-bottom: 6px;
    }
    .field input {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      background-color: #f8f9fa;
    }
    .button-container {
      text-align: center;
      margin-top: 30px;
    }
    
  </style>
</head>
<body>
  <div class="container">
    <h2 style="text-align: center;">📚 Informasi Peminjaman</h2>

    <div class="field">
      <label>Nama Peminjam</label>
      <input type="text" id="nama" readonly>
    </div>

    <div class="field">
      <label>Judul Buku</label>
      <input type="text" id="judul" readonly>
    </div>

    <div class="field">
      <label>Tanggal Peminjaman</label>
      <input type="text" id="tglPinjam" readonly>
    </div>

    <div class="field">
      <label>Tanggal Pengembalian</label>
      <input type="text" id="tglKembali" readonly>
    </div>

    <div class="field">
      <label>Status</label>
      <input type="text" id="status" readonly>
    </div>

    <div class="button-container">
      <a href="/admin/daftarpeminjaman" class="btn-kembali">&larr; Kembali ke Daftar Peminjaman</a>
    </div>
  </div>

  <script>
    
    const params = new URLSearchParams(window.location.search);

    document.getElementById("nama").value = params.get("nama") || "-";
    document.getElementById("judul").value = params.get("judul") || "-";
    document.getElementById("tglPinjam").value = params.get("tglPinjam") || "-";
    document.getElementById("tglKembali").value = params.get("tglKembali") || "-";
    document.getElementById("status").value = params.get("status") || "-";
  </script>
</body>
</html>
