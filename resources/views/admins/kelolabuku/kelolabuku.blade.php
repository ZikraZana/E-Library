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
        <h2 class="text-center mb-4">📚 Kelola Daftar Buku</h2>

        <div class="mb-3 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahBuku">+ Tambah Buku</button>
        </div>

    <!-- Modal -->
    <div class="modal fade" id="modalTambahBuku" tabindex="-1" aria-labelledby="modalTambahBukuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formBuku" action="{{ route('kelolabuku.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="modalTambahBukuLabel">Tambah Buku</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Semua inputanmu -->
            <div class="mb-3">
                <label>No Katalog</label>
                <input type="text" name="no_katalog" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Judul Buku</label>
                <input type="text" name="judul_buku" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jumlah Buku</label>
                <input type="number" name="jumlah_buku" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Cover Buku</label>
                <input type="file" name="cover_buku" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
        </form>
    </div>
    </div>
        <table class="table table-bordered table-hover" id="bukuTable">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Aksi</th> 
                </tr>
            </thead>
            <tbody>
                @if ($buku->count() >0)
                @foreach ($buku as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->judul_buku }}</td>
                    <td>{{ $item->penulis }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>
                        <a href="{{ route('kelolabuku.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kelolabuku.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">Tidak ada data buku.</td>
            </tr>
        @endif
            </tbody>
        </table>
    </div>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
