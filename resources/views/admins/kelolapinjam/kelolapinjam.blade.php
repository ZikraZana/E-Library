@extends('admins.layouts.layout')

@section('content')
<div style="margin: 10px 0 20px 20px;">
    <a href="/admin/dashboard" style="text-decoration: none;">
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
                    <form action="{{ route('kelolapinjam.store') }}" method="POST">
    @csrf
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
        <table class="table table-bordered table-striped">
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
            @foreach($peminjaman as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->buku->judul_buku }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->tanggal_peminjaman)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->tanggal_pengembalian)->format('d M Y') }}</td>
                    <td>
                        @if($data->status === 'Belum dipinjam')
                            <span class="badge bg-secondary">Belum dipinjam</span>
                        @elseif($data->status === 'Dipinjam')
                            <span class="badge bg-warning">Dipinjam</span>
                        @elseif($data->status === 'Dikembalikan')
                            <span class="badge bg-success">Dikembalikan</span>
                        @endif
                    </td>
                    <td>
                        @if($data->status === 'Dipinjam')
                            <form action="{{ route('peminjaman.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Dikembalikan">
                                <button type="submit" class="btn btn-success btn-sm">Konfirmasi Pengembalian</button>
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
@endsection
