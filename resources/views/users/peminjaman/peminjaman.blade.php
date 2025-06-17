<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Peminjaman Buku</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f4f8;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .form-container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 700px;
    }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
    }

    input[type="text"],
    input[type="date"] {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
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
      background-color: #0f5ec2;
    }
  </style>
</head>

<body>
  <div class="form-container">
    <h2>📚 Form Peminjaman Buku</h2>
    <form method="POST" action="{{ route('peminjaman.storeUser') }}">
      @csrf

      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
      <input type="hidden" name="buku_id" value="{{ $buku->id }}">
      <input type="hidden" name="status" value="Belum Dipinjam">


      <label>Nama Peminjam</label>
      <input type="text" value="{{ Auth::user()->nama_lengkap }}" readonly>

      <label>Judul Buku</label>
      <input type="text" value="{{ $buku->judul_buku }}" readonly>

      <label for="tanggalPinjam">Tanggal Peminjaman</label>
      <input type="date" id="tanggalPinjam" name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman') }}" required>

      <label for="tanggalKembali">Tanggal Pengembalian</label>
      <input type="date" id="tanggalKembali" name="tanggal_pengembalian" value="{{ old('tanggal_pengembalian') }}" required>

      <button type="submit">Konfirmasi Peminjaman</button>
    </form>
  </div>
</body>

</html>
