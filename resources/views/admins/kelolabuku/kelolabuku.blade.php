@extends('admins.layouts.layout')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">📚 Kelola Daftar Buku</h2>

        <div class="mb-3 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bukuModal">+ Tambah Buku</button>
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
                <tr>
                    <td>1</td>
                    <td>Algoritma dan Pemrograman</td>
                    <td>R. Abdul</td>
                    <td>Informatika</td>
                    <td>
                        <button class="btn btn-warning btn-sm btn-edit">Edit</button>
                        <button class="btn btn-danger btn-sm btn-hapus">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah/Edit Buku -->
    <div class="modal fade" id="bukuModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formBuku">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Tambah Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editIndex" />
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" id="judul" required />
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="penulis" required />
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" id="kategori" required />
                        </div>
                        <div class="mb-3">
                            <label for="informasi" class="form-label">Informasi (Opsional)</label>
                            <input type="text" class="form-control" id="kategori" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
