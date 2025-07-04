@extends('admins.layouts.layout')

@section('content')


    <div class="container mt-5" style="margin-bottom: 150px">
        <a href="/admin/dashboard" class="btn border-white" style="background-color: #d3d3d3;">
            <i style="margin-right: 8px;">←</i>
            <span style="font-size: 16px;">Kembali</span>
        </a>
        <h2 class="text-center mb-5">📘 Kelola Peminjaman Buku</h2>

        {{-- Form Tambah Peminjaman --}}
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Tambah Peminjaman</h5>
                <div class="row g-3">
                    <form action="{{ route('admins.kelolapinjam.store') }}" method="POST">
                        @csrf
                        @if (
                            $errors->has('user_id') ||
                                $errors->has('buku_id') ||
                                $errors->has('tanggal_peminjaman') ||
                                $errors->has('tanggal_pengembalian'))
                            <div class="alert alert-danger">
                                <ul style="margin: 0;">
                                    @if ($errors->has('user_id'))
                                        <li>{{ $errors->first('user_id') }}</li>
                                    @endif
                                    @if ($errors->has('buku_id'))
                                        <li>{{ $errors->first('buku_id') }}</li>
                                    @endif
                                    @if ($errors->has('tanggal_peminjaman'))
                                        <li>{{ $errors->first('tanggal_peminjaman') }}</li>
                                    @endif
                                    @if ($errors->has('tanggal_pengembalian'))
                                        <li>{{ $errors->first('tanggal_pengembalian') }}</li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                        <div class="row g-3">
                            <div class="col-md-3">
                                <select name="user_id" class="form-control" required>
                                    <option value="">-- Pilih Peminjam --</option>
                                    @foreach ($pengguna as $user)
                                        <option value="{{ $user->id }}">{{ $user->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="buku_id" class="form-control" required>
                                    <option value="">-- Pilih Buku --</option>
                                    @foreach ($buku as $item)
                                        <option value="{{ $item->id }}">{{ $item->judul_buku }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_peminjaman" class="form-control" required />
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_pengembalian" class="form-control" required />
                            </div>

                            <input type="hidden" name="status" value="Dipinjam">
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary mt-2">Tambah Peminjaman</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        {{-- Tabel Peminjaman --}}
        <table class="table table-bordered table-striped mb-5">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <button href="#" class="btn btn-info border-black" data-bs-toggle="modal"
                                data-bs-target="#userModal{{ $data->id }}">
                                {{ $data->user->nama_lengkap }}
                            </button>

                            <!-- Modal User Detail -->
                            <div class="modal fade" id="userModal{{ $data->id }}" tabindex="-1"
                                aria-labelledby="userModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="userModalLabel">Detail Peminjam</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Nama:</strong> {{ $data->user->nama_lengkap }}</p>
                                            <p><strong>Email:</strong> {{ $data->user->email }}</p>
                                            <p><strong>No. Telepon:</strong> {{ $data->user->nomor_hp }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $data->buku->judul_buku }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->tanggal_peminjaman)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->tanggal_pengembalian)->format('d M Y') }}</td>
                        <td>
                            @if ($data->status === 'Belum Dipinjam')
                                <span class="badge bg-secondary">Belum dipinjam</span>
                            @elseif($data->status === 'Dipinjam')
                                <span class="badge bg-warning">Dipinjam</span>
                            @elseif($data->status === 'Dikembalikan')
                                <span class="badge bg-success">Dikembalikan</span>
                            @endif
                        </td>
                        <td>
                            @if ($data->status === 'Belum Dipinjam')
                                <form action="{{ route('admins.kelolapinjam.update', $data->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="Dipinjam">
                                    <button type="button" class="btn btn-warning btn-sm border-black"
                                        data-bs-toggle="modal" data-bs-target="#konfirmasiModal{{ $data->id }}">Buku
                                        telah dipinjam</button>

                                    <!-- Modal Konfirmasi -->
                                    <div class="modal fade" id="konfirmasiModal{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi
                                                        Pengembalian</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin mengkonfirmasi pengembalian buku
                                                    "{{ $data->buku->judul_buku }}" dari {{ $data->user->nama_lengkap }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Konfirmasi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @elseif ($data->status === 'Dipinjam')
                                <form action="{{ route('admins.kelolapinjam.update', $data->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="Dikembalikan">
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#konfirmasiModal{{ $data->id }}">Konfirmasi
                                        Pengembalian</button>

                                    <!-- Modal Konfirmasi -->
                                    <div class="modal fade" id="konfirmasiModal{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi
                                                        Pengembalian</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin mengkonfirmasi pengembalian buku
                                                    "{{ $data->buku->judul_buku }}" dari {{ $data->user->nama_lengkap }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Konfirmasi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @elseif($data->status === 'Dikembalikan')
                                <button class="btn btn-secondary btn-sm" disabled>Selesai</button>
                            @else
                                <em>-</em>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success_insert'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "Berhasil Menambahkan peminjaman!"
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
@endsection
