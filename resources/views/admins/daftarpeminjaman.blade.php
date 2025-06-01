<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Peminjaman</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f8;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #f1f5f9;
    }

    tr:hover {
      background-color: #f9fafb;
    }

    .btn-detail {
      background-color: #1273ed;
      color: white;
      padding: 6px 12px;
      border: none;
      border-radius: 6px;
      text-decoration: none;
      font-size: 14px;
    }

    .btn-detail:hover {
      background-color: #1273ed;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>📚 Riwayat Peminjaman Buku</h2>
    <table>
      <thead>
        <tr>
          <th>Nama Peminjam</th>
          <th>Judul Buku</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Kembali</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Rina Marlina</td>
          <td>Belajar HTML & CSS</td>
          <td>01/05/2025</td>
          <td>07/05/2025</td>
          <td>Sudah Dikembalikan</td>
          <td><a href="detail-peminjaman.html" class="btn-detail">Detail</a></td>
        </tr>
        <tr>
          <td>Andi Saputra</td>
          <td>JavaScript Dasar</td>
          <td>25/05/2025</td>
          <td>31/05/2025</td>
          <td>Belum Dikembalikan</td>
          <td><a href="detail-peminjaman.html" class="btn-detail">Detail</a></td>
        </tr>
        <tr>
            <td>Lisa Oktaviani</td>
            <td>Dasar-Dasar UI/UX</td>
            <td>28/05/2025</td>
            <td>04/06/2025</td>
            <td>Belum Dikembalikan</td>
            <td><a href="detail-lisa.html" class="btn-detail">Detail</a></td>
        </tr>
        <tr>
            <td>Siti Nurhaliza</td>
            <td>Pemrograman Python</td>
            <td>20/05/2025</td>
            <td>26/05/2025</td>
            <td>Sudah Dikembalikan</td>
            <td><a href="detail-siti.html" class="btn-detail">Detail</a></td>
        </tr>
        <tr>
            <td>Budi Santoso</td>
            <td>Algoritma dan Struktur Data</td>
            <td>22/05/2025</td>
            <td>29/05/2025</td>
            <td>Belum Dikembalikan</td>
            <td><a href="detail-budi.html" class="btn-detail">Detail</a></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
