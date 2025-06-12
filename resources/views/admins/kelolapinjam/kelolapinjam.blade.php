@extends('admins.layouts.layout')

@section('content')
<div style="margin: 10px 0 20px 20px;">
    <a href="/admin" style="text-decoration: none;">
        <button style="background-color: white; color: #007bff; font-size: 18px; border: none; border-radius: 5px; cursor: pointer;">
            <h3>←</h3>
        </button>
    </a>
</div>
    <div class="container mt-5">
        <h2 class="text-center mb-5">📘 Kelola Peminjaman Buku</h2>

        {{-- Form Tambah Peminjaman --}}
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Tambah Peminjaman</h5>
                <div class="row g-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control" placeholder="Nama Peminjam" required />
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" placeholder="Judul Buku" required />
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" required />
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" placeholder="Durasi (hari)"
                            min="1" required />
                    </div>
                    <div class="col-md-12 text-end">
                        <button class="btn btn-primary mt-2">Tambah Peminjaman</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel Peminjaman --}}
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Abdul</td>
                    <td>Pemrograman Web</td>
                    <td>01 Juni 2025</td>
                    <td>08 Juni 2025</td>
                    <td><span class="badge bg-secondary">Belum dipinjam</span></td>
                    <td></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Siti Aisyah</td>
                    <td>Pemrograman Web</td>
                    <td>01 Juni 2025</td>
                    <td>08 Juni 2025</td>
                    <td><span class="badge bg-warning">Dipinjam</span></td>
                    <td><button class="btn btn-success btn-sm">Konfirmasi Pengembalian</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ahmad Fadli</td>
                    <td>Sistem Basis Data</td>
                    <td>28 Mei 2025</td>
                    <td>04 Juni 2025</td>
                    <td><span class="badge bg-success">Dikembalikan</span></td>
                    <td><button class="btn btn-secondary btn-sm" disabled>Selesai</button></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
