<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Peminjaman</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f4f8;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .form-container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 700px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 200;
    }

    input[type="text"],
    input[type="date"] {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
      font-weight: normal; 
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #1273ed;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    button:hover {
      background-color: #1273ed;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #1273ed;
      text-decoration: none;
      font-size: 14px;
    }

    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>📚 Form Peminjaman Buku</h2>
    <form method="POST" action="{{ route('users.peminjaman.store') }}">
  @csrf
  
  <input type="hidden" name="user_id" value="{{ Auth::id() }}">
  <input type="hidden" name="buku_id" value="{{ $buku->id }}">

  <label>Nama Peminjam</label>
  <input type="text" value="{{ Auth::user()->nama_lengkap }}" readonly>

  <label>Judul Buku</label>
  <input type="text" value="{{ $buku->judul_buku }}" readonly>

  <label for="tanggalPinjam">Tanggal Peminjaman</label>
  <input type="date" id="tanggalPinjam" name="tanggal_peminjaman" required>

  <label for="tanggalKembali">Tanggal Pengembalian</label>
  <input type="date" id="tanggalKembali" name="tanggal_pengembalian" required>

  <button type="submit">Konfirmasi Peminjaman</button>
</form>

</body>
</html>
