<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Form Pengembalian Buku</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f0f4f8;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 700px;
      margin: 50px auto;
      padding: 30px;
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #1f2937;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-bottom: 6px;
      font-weight: 600;
      color: #374151;
    }

    input, select, textarea {
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      font-size: 15px;
      background-color: #f9fafb;
      font-weight: normal;
    }

    button {
      background-color: #1273ed;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color: #1273ed;
    }

    .back-link {
      display: block;
      margin-top: 25px;
      text-align: center;
      color: #1273ed;
      text-decoration: none;
    }

    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>📚 Form Pengembalian Buku</h2>
    <form>
      <label for="judul">Judul Buku</label>
      <input type="text" id="judul" name="judul" value="Sejarah Dunia Lengkap" readonly />

      <label for="nama">Nama Peminjam</label>
      <input type="text" id="nama" name="nama" value="Ahmad" readonly />

      <label for="tanggalPinjam">Tanggal Pinjam</label>
      <input type="date" id="tanggalPinjam" name="tanggalPinjam" value="2025-05-01" readonly />

      <label for="tanggalKembali">Tanggal Kembali</label>
      <input type="date" id="tanggalKembali" name="tanggalKembali" value="2025-05-15" />

      <label for="catatan">Catatan Tambahan</label>
      <textarea id="catatan" name="catatan" rows="3" placeholder="Opsional..."></textarea>

      <button type="submit">Konfirmasi Pengembalian</button>
    </form>

    <a href="histori-peminjaman.html" class="back-link">← Kembali ke Histori</a>
  </div>
</body>
</html>
