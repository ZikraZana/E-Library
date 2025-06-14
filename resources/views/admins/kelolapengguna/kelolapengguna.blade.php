@extends('admins.layouts.layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">📘 Kelola Pengguna</h2>
    <!-- Form Tambah Peminjaman -->
    <div class="card mb-4">
      <div class="card-body">
        <h5 class="card-title">Tambah Pengguna</h5>
        <div class="row g-3">
          <div class="col-md-3">
            <input type="text" id="inputNama" class="form-control" placeholder="Nama" required />
          </div>
          <div class="col-md-3">
            <input type="text" id="inputJudul" class="form-control" placeholder="Email" required />
          </div>
          <div class="col-md-12 text-end">
            <button class="btn btn-primary mt-2" id="btnTambah">Tambah Pengguna</button>
          </div>
        </div>
      </div> 
    </div>

    <!-- Tabel Peminjaman -->
    <table class="table table-bordered table-striped">
      <thead class="table-primary">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="pinjamTable">
        <tr>
          <td>1</td>
          <td>Siti Aisyah</td>
          <td>sitisiti@gmail.com</td>
          <td><span class="badge bg-success">Aktif</span></td>
          <td><button class="btn btn-danger btn-sm btn-konfirmasi">Non-Aktifkan</button></td>
        </tr>
        <tr>
          <td>2</td>
          <td>Ahmad Fadli</td>
          <td>fadliahmad@gmail.com</td>
          <td><span class="badge bg-success">Aktif</span></td>
          <td><button class="btn btn-danger btn-sm btn-konfirmasi">Non-Aktifkan</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
@endsection