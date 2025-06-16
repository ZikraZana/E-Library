@extends('admins.layouts.layout')

@section('content')
    <div style="margin: 10px 0 20px 10px;">
        <a href="/admin/dashboard" style="text-decoration: none;">
            <button
                style="background-color: white; color: #007bff; font-size: 18px; border: none; border-radius: 5px; cursor: pointer;">
                <h3>←</h3>
            </button>
        </a>
    </div>
    <div class="container mt-5">
        <h2 class="text-center mb-4">📘 Kelola Pengguna</h2>

        <!-- Tabel Pengguna -->
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No Handphone</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($pengguna->count() > 0)
                    @foreach ($pengguna as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->nomor_hp }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modaldelete{{ $item->id }}">Hapus</button>
                                <!-- Modal -->
                                <div class="modal fade" id="modaldelete{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="modalTambahBukuLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form id="formBuku" action="{{ route('kelolapengguna.destroy', $item->id) }}"
                                            method="POST" enctype="multipart/form-data" class="modal-content">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTambahBukuLabel">Hapus Buku</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Semua inputanmu -->
                                                Apakah anda yakin ingin menghapus akun {{ $item->nama_lengkap }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data pengguna.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
@endsection
