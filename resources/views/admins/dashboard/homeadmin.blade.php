@extends('admins.layouts.layout')

@section('title')
    Dashboard Admin
@endsection

@section('content')
    <h3>Selamat datang, {{ Auth::guard('admin')->user()->name }}!</h3>
    <p>Silakan pilih menu di bawah untuk mengelola sistem perpustakaan:</p>

    <div class="row g-3 mt-3">
        <div class="col-md-4">
            <a href="/admin/daftarpeminjaman" class="btn btn-primary w-100">📚 Daftar Peminjaman</a>
        </div>
        <div class="col-md-4">
            <a href="/admin/kelolapinjam" class="btn btn-success w-100">✅ Kelola Peminjaman</a>
        </div>
        <div class="col-md-4">
            <a href="/admin/kelolabuku" class="btn btn-warning w-100">📝 Kelola Buku</a>
        </div>
        <div class="col-md-4">
            <a href="tambah-buku.html" class="btn btn-info w-100">➕ Tambah Buku Baru</a>
        </div>
        <div class="col-md-4">
            <a href="kelola-user.html" class="btn btn-secondary w-100">👤 Kelola Pengguna</a>
        </div>
    </div>
@endsection
