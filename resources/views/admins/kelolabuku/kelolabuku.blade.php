@extends('admins.layouts.layout')

@section('content')
    <div style="margin: 10px 0 20px 20px;">
        <a href="/admin/dashboard" style="text-decoration: none;">
            <button
                style="background-color: white; color: #007bff; font-size: 18px; border: none; border-radius: 5px; cursor: pointer;">
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
        <div class="modal fade" id="modalTambahBuku" tabindex="-1" aria-labelledby="modalTambahBukuLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form id="formBuku" action="{{ route('admins.kelolabuku.store') }}" method="POST"
                    enctype="multipart/form-data" class="modal-content">
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
                            @error('no_katalog')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Judul Buku</label>
                            <input type="text" name="judul_buku" class="form-control" required>
                            @error('judul_buku')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Penulis</label>
                            <input type="text" name="penulis" class="form-control" required>
                            @error('penulis')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Penerbit</label>
                            <input type="text" name="penerbit" class="form-control" required>
                            @error('penerbit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Kategori</label>
                            <select class="form-select" aria-label="Default select example" name="kategori">
                                <option selected disabled value="">Open this select menu</option>
                                <option value="Informatika">Informatika</option>
                                <option value="Sejarah">Sejarah</option>
                                <option value="Ilmiah">Ilmiah</option>
                                <option value="Kedokteran">Kedokteran</option>
                                <option value="Hukum">Hukum</option>
                                <option value="Manajemen">Manajemen</option>
                                <option value="Sains">Sains</option>
                                <option value="Politik">Politik</option>
                                <option value="Sastra">Sastra</option>
                                <option value="Novel">Novel</option>
                                <option value="Psikologi">Psikologi</option>
                                <option value="Teknik">Teknik</option>
                                <option value="Pendidikan">Pendidikan</option>
                            </select>
                            @error('kategori')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Jumlah Buku</label>
                            <input type="number" name="jumlah_buku" class="form-control" required>
                            @error('jumlah_buku')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Cover Buku</label>
                            <input type="file" name="cover_buku" class="form-control" required>
                            @error('cover_buku')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
                    <th>Penerbit</th>
                    <th>Jumlah Buku</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($buku->count() > 0)
                    @foreach ($buku as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->judul_buku }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->penerbit }}</td>
                            <td>{{ $item->jumlah_buku }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modaledit{{ $item->id }}">Edit</button>
                                <!-- Modal -->
                                <div class="modal fade" id="modaledit{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="modalTambahBukuLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form id="formBuku" action="{{ route('admins.kelolabuku.update', $item->id) }}"
                                            method="POST" enctype="multipart/form-data" class="modal-content">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTambahBukuLabel">Edit Buku</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Semua inputanmu -->
                                                <div class="mb-3">
                                                    <label>No Katalog</label>
                                                    <input type="text" name="no_katalog" class="form-control"
                                                        value="{{ $item->no_katalog }}" required>
                                                    @error('no_katalog')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label>Judul Buku</label>
                                                    <input type="text" name="judul_buku" class="form-control"
                                                        value="{{ $item->judul_buku }}" required>
                                                    @error('judul_buku')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label>Penulis</label>
                                                    <input type="text" name="penulis" class="form-control"
                                                        value="{{ $item->penulis }}" required>
                                                    @error('penulis')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label>Penerbit</label>
                                                    <input type="text" name="penerbit" class="form-control"
                                                        value="{{ $item->penerbit }}" required>
                                                    @error('penerbit')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label>Kategori</label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="kategori">
                                                        <option disabled value="">Open this select menu</option>
                                                        <option value="Informatika"
                                                            {{ $item->kategori == 'Informatika' ? 'selected' : '' }}>
                                                            Informatika</option>
                                                        <option value="Sejarah"
                                                            {{ $item->kategori == 'Sejarah' ? 'selected' : '' }}>Sejarah
                                                        </option>
                                                        <option value="Ilmiah"
                                                            {{ $item->kategori == 'Ilmiah' ? 'selected' : '' }}>Ilmiah
                                                        </option>
                                                        <option value="Kedokteran"
                                                            {{ $item->kategori == 'Kedokteran' ? 'selected' : '' }}>
                                                            Kedokteran</option>
                                                        <option value="Hukum"
                                                            {{ $item->kategori == 'Hukum' ? 'selected' : '' }}>Hukum
                                                        </option>
                                                        <option value="Manajemen"
                                                            {{ $item->kategori == 'Manajemen' ? 'selected' : '' }}>
                                                            Manajemen</option>
                                                        <option value="Sains"
                                                            {{ $item->kategori == 'Sains' ? 'selected' : '' }}>Sains
                                                        </option>
                                                        <option value="Politik"
                                                            {{ $item->kategori == 'Politik' ? 'selected' : '' }}>Politik
                                                        </option>
                                                        <option value="Sastra"
                                                            {{ $item->kategori == 'Sastra' ? 'selected' : '' }}>Sastra
                                                        </option>
                                                        <option value="Novel"
                                                            {{ $item->kategori == 'Novel' ? 'selected' : '' }}>Novel
                                                        </option>
                                                        <option value="Psikologi"
                                                            {{ $item->kategori == 'Psikologi' ? 'selected' : '' }}>
                                                            Psikologi</option>
                                                        <option value="Teknik"
                                                            {{ $item->kategori == 'Teknik' ? 'selected' : '' }}>Teknik
                                                        </option>
                                                        <option value="Pendidikan"
                                                            {{ $item->kategori == 'Pendidikan' ? 'selected' : '' }}>
                                                            Pendidikan</option>
                                                    </select>
                                                    @error('kategori')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label>Jumlah Buku</label>
                                                    <input type="number" name="jumlah_buku" class="form-control"
                                                        value="{{ $item->jumlah_buku }}" required>
                                                    @error('jumlah_buku')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label>Cover Buku</label>
                                                    <input type="file" name="cover_buku" class="form-control"
                                                        value="{{ asset('storage/' . $item->cover_buku) }}">
                                                    @error('cover_buku')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modaldelete{{ $item->id }}">Hapus</button>
                                <!-- Modal -->
                                <div class="modal fade" id="modaldelete{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="modalTambahBukuLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form id="formBuku" action="{{ route('admins.kelolabuku.destroy', $item->id) }}"
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
                                                Apakah anda yakin ingin menghapus buku {{ $item->judul_buku }}?
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
                        <td colspan="7" class="text-center">Tidak ada data buku.</td>
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
