<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Riwayat Buku</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      margin: 0;
      padding: 20px;
    }

    h2 {
      text-align: center;
      color: #333;
    }

    .back-button {
      display: block;
      width: fit-content;
      margin: 10px auto 25px auto;
      padding: 10px 20px;
      background-color: #1273ed;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .back-button:hover {
      background-color: #0f5ec2;
    }

    .tabs {
      display: flex;
      margin-bottom: 20px;
      justify-content: center;
    }

    .tab {
      flex: 1;
      text-align: center;
      padding: 10px;
      cursor: pointer;
      border-bottom: 2px solid transparent;
      font-weight: bold;
      color: #007bff;
    }

    .tab.active {
      border-bottom: 2px solid #007bff;
      color: #0056b3;
    }

    .table-section {
      display: none;
    }

    .table-section.active {
      display: block;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th, td {
      padding: 12px 15px;
      border: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #1273ed;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #eef2ff;
    }
  </style>
</head>
<body>

  <h2>📚 Riwayat Buku</h2>

  <div class="tabs">
    <div class="tab active" id="tab-peminjaman">Peminjaman</div>
    <div class="tab" id="tab-pengembalian">Pengembalian</div>
  </div>

  <div id="peminjaman" class="table-section active">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Judul Buku</th>
          <th>Tanggal Peminjaman</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Pengantar Ilmu Komputer</td>
          <td>15 Mei 2025</td>
          <td>Dipinjam</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Machine Learning: Teori dan Metode</td>
          <td>20 Mei 2025</td>
          <td>Dipinjam</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div id="pengembalian" class="table-section">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Judul Buku</th>
          <th>Tanggal Pengembalian</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Algoritma dan Struktur Data</td>
          <td>10 Mei 2025</td>
          <td>Dikembalikan</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Jaringan Komputer</td>
          <td>5 Mei 2025</td>
          <td>Dikembalikan</td>
        </tr>
      </tbody>
    </table>
  </div>

   <a href="/home" class="back-button">Kembali ke Beranda</a>


  <script>
    const tabPeminjaman = document.getElementById('tab-peminjaman');
    const tabPengembalian = document.getElementById('tab-pengembalian');
    const peminjamanSection = document.getElementById('peminjaman');
    const pengembalianSection = document.getElementById('pengembalian');

    tabPeminjaman.addEventListener('click', () => {
      tabPeminjaman.classList.add('active');
      tabPengembalian.classList.remove('active');
      peminjamanSection.classList.add('active');
      pengembalianSection.classList.remove('active');
    });

    tabPengembalian.addEventListener('click', () => {
      tabPengembalian.classList.add('active');
      tabPeminjaman.classList.remove('active');
      pengembalianSection.classList.add('active');
      peminjamanSection.classList.remove('active');
    });
  </script>

</body>
</html>
