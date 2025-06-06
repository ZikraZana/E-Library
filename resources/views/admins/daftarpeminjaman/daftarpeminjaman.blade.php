@extends('admins.layouts.layout')

@section('content')
    <div class="container">
        <h2 class="text-center mb-5">📚 Riwayat Peminjaman Buku</h2>

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
            <tbody id="pinjamTable">
                <tr>
                    <td>1</td>
                    <td>Siti Aisyah</td>
                    <td>Pemrograman Web</td>
                    <td>01 Juni 2025</td>
                    <td>08 Juni 2025</td>
                    <td><span class="badge bg-warning">Dipinjam</span></td>
                    <td><a href="/admin/detailpeminjaman" class="btn btn-primary btn-sm btn-konfirmasi">Detail</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ahmad Fadli</td>
                    <td>Sistem Basis Data</td>
                    <td>28 Mei 2025</td>
                    <td>04 Juni 2025</td>
                    <td><span class="badge bg-success">Dikembalikan</span></td>
                    <td><a href="/admin/detailpeminjaman" class="btn btn-primary btn-sm btn-konfirmasi">Detail</a></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
