<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Riwayat Buku</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    body {
      font-family: Arial, sans-serif;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      margin: 0;
      padding: 50px;
    }

    h2 {
      text-align: center;
      color: #333;
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
  <main class="py-4">
    <div class="container">
      <div class="row align-items-center mb-4">
        <div class="col-auto">
          <a href="/" class="btn btn-light">←</a>
        </div>
        <div class="col text-center">
          <h2 class="fw-bold mb-0">📚 Riwayat Buku</h2>
        </div>
      </div>

      <div class="tabs">
        <div class="tab active" id="tab-peminjaman">Peminjaman</div>
        <div class="tab" id="tab-pengembalian">Pengembalian</div>
      </div>

      {{-- Tabel Peminjaman --}}
      <div id="peminjaman" class="table-section active">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul Buku</th>
              <th>Tanggal Peminjaman</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @php $no = 1; @endphp
            @foreach ($peminjaman->whereIn('status', ['Belum Dipinjam', 'Dipinjam']) as $item)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->buku->judul_buku ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->format('d M Y') }}</td>
                <td>{{$item->status}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- Tabel Pengembalian --}}
      <div id="pengembalian" class="table-section">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul Buku</th>
              <th>Tanggal Pengembalian</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @php $no = 1; @endphp
            @foreach ($peminjaman->where('status', 'Dikembalikan') as $item)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->buku->judul_buku ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_pengembalian)->format('d M Y') }}</td>
                <td>{{$item->status}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

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
  </main>
</body>
</html>
