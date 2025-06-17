@extends('admins.layouts.layout')

@section('title')
    Dashboard Admin
@endsection

@section('content')
    <h3>Selamat datang, {{ Auth::guard('admin')->user()->name }}!</h3>
    <p>Silakan pilih menu di bawah untuk mengelola sistem perpustakaan:</p>

    <div class="row g-3 mt-3">
        <div class="col-md-4">
            <a href="/admin/kelolapinjam" class="btn btn-success w-100">✅ Kelola Peminjaman</a>
        </div>
        <div class="col-md-4">
            <a href="/admin/kelolabuku" class="btn btn-warning w-100">📝 Kelola Buku</a>
        </div>
        <div class="col-md-4">
            <a href="/admin/kelolapengguna" class="btn btn-secondary w-100">👤 Kelola Pengguna</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-start",
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
                title: "Berhasil Login!"
            });
        </script>
    @endif
@endsection
