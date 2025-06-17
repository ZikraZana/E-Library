<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Home</title>
    <style>
        .header {
            background-image: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f');
            background-size: cover;
            background-position: center;
            padding: 50px;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 8px;
            width: 80%;
            max-width: 900px;
        }

        .login-link {
            font-weight: bold;
        }

        .search-bar {
            width: 100%;
            max-width: 600px;
        }

        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .search-container {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .form-control.search-bar {
            width: 100%;
            max-width: 900px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .card {
            height: 100%;
            min-height: 350px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card-img-top {
            height: 220px;
            object-fit: cover;
        }

        .card-title {
            font-size: 16px;
            margin-top: 10px;
            text-align: center;
        }

        .kategori-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .kategori-button {
            flex: 1 1 10px;
            max-width: 120px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div style="position: absolute; top: 20px; right: 20px;">
        <div class="dropdown" style="position: absolute; top: 20px; right: 20px;">
            @if (Auth::check('auth'))
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownLogin" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    👤 {{ Auth::user()->nama_lengkap }}
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLogin">
                    <a class="dropdown-item" href="/profileuser">Profil</a>
                    <a class="dropdown-item" href="/wishlist">Wishlist</a>
                    <a class="dropdown-item" href="/historiuser">Riwayat Peminjaman</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn dropdown-item text-danger">Logout</button>
                    </form>
                </div>
            @elseif (Auth::guard('admin')->check())
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownLogin" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    👤 {{ Auth::guard('admin')->user()->name }}
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLogin">
                    <a class="dropdown-item" href="/admin/profileadmin">Profil</a>
                    <form action="/logout/admin" method="POST">
                        @csrf
                        <button type="submit" class="btn dropdown-item text-danger">Logout</button>
                    </form>
                </div>
            @else
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownLogin" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    👤 Login
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLogin">
                    <a class="dropdown-item" href="/loginregister">Login sebagai User</a>
                    <a class="dropdown-item" href="/login/admin">Login sebagai Admin</a>
                </div>
            @endif

        </div>
    </div>

    <div class="header text-center">
        <div class="overlay">
            <h2>Mau baca buku apa hari ini?</h2>
            <form action="{{ route('tampilDataBukuHome') }}" method="GET">
                <input type="text" class="form-control search-bar" name="search" placeholder="Cari buku..."
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>

    <div class="container mt-4 mb-5 pb-5">
        <div class="kategori-container">
            <a href="{{ route('tampilDataBukuHome', ['kategori' => 'Informatika']) }}"
                class="btn btn-primary kategori-button">Informatika</a>
            <a href="{{ route('tampilDataBukuHome', ['kategori' => 'Sejarah']) }}"
                class="btn btn-primary kategori-button">Sejarah</a>
            <a href="{{ route('tampilDataBukuHome', ['kategori' => 'Ilmiah']) }}"
                class="btn btn-primary kategori-button">Ilmiah</a>
            <a href="{{ route('tampilDataBukuHome', ['kategori' => 'Kedokteran']) }}"
                class="btn btn-primary kategori-button">Kedokteran</a>
            <a href="{{ route('tampilDataBukuHome', ['kategori' => 'Hukum']) }}"
                class="btn btn-primary kategori-button">Hukum</a>
            <a href="{{ route('tampilDataBukuHome', ['kategori' => 'Manajemen']) }}"
                class="btn btn-primary kategori-button">Manajemen</a>
            <a href="{{ route('tampilDataBukuHome', ['kategori' => 'Sains']) }}"
                class="btn btn-primary kategori-button">Sains</a>
            <a href="{{ route('tampilDataBukuHome', ['kategori' => 'Politik']) }}"
                class="btn btn-primary kategori-button">Politik</a>
            <a href="{{ route('tampilDataBukuHome', ['kategori' => 'Sastra']) }}"
                class="btn btn-primary kategori-button">Sastra</a>

            <div class="dropdown m-1">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="lainnyaDropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lainnya
                </button>
                <div class="dropdown-menu" aria-labelledby="lainnyaDropdown">
                    <a class="dropdown-item"
                        href="{{ route('tampilDataBukuHome', ['kategori' => 'Novel']) }}">Novel</a>
                    <a class="dropdown-item"
                        href="{{ route('tampilDataBukuHome', ['kategori' => 'Psikologi']) }}">Psikologi</a>
                    <a class="dropdown-item"
                        href="{{ route('tampilDataBukuHome', ['kategori' => 'Teknik']) }}">Teknik</a>
                    <a class="dropdown-item"
                        href="{{ route('tampilDataBukuHome', ['kategori' => 'Informatika']) }}">Informatika</a>
                    <a class="dropdown-item"
                        href="{{ route('tampilDataBukuHome', ['kategori' => 'Pendidikan']) }}">Pendidikan</a>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            @if (!request('search') && !request('kategori'))
                <h4 class="mt-4">Rekomendasi</h4>
            @elseif (request('search'))
                <p class="mt-4">
                    <a href="{{ route('tampilDataBukuHome') }}" class="btn btn-secondary btn-sm rounded-pill"><i
                            class="fas fa-arrow-left"></i> Kembali</a>
                    <span class="ms-3">Hasil pencarian untuk: <span
                            class="badge bg-primary rounded-pill">{{ request('search') }}</span></span>
                </p>
            @elseif (request('kategori'))
                <p class="mt-4">
                    <a href="{{ route('tampilDataBukuHome') }}" class="btn btn-secondary btn-sm rounded-pill"><i
                            class="fas fa-arrow-left"></i> Kembali</a>
                    <span class="ms-3">Kategori: <span
                            class="badge bg-primary rounded-pill">{{ request('kategori') }}</span></span>
                </p>
            @endif
            <a href="{{ route('tampilDataBukuDaftarBuku') }}" class="mt-3"
                style="text-decoration: underline !important;">Lihat Semua</a>
        </div>

        @if (request('search') && $daftarbuku->isEmpty())
            <p>Tidak ditemukan buku dengan judul tersebut.</p>
        @endif

        @if (request('kategori') && $daftarbuku->isEmpty())
            <p>Tidak ditemukan buku dengan kategori tersebut.</p>
        @endif
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4">
            @foreach ($daftarbuku as $buku)
                <div class="col">
                    <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal{{ $buku->id }}"
                        data-title="{{ $buku->judul_buku }}" data-img="{{ asset('storage/' . $buku->cover_buku) }}"
                        style="transition: transform 0.3s ease-in-out; cursor: pointer;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        <img src="{{ asset('storage/' . $buku->cover_buku) }}" class="card-img-top" alt="Buku">
                        <div class="card-body">
                            <h5 class="card-title">{{ $buku->judul_buku }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @foreach ($daftarbuku as $buku)
            <div class="modal fade" id="bookModal{{ $buku->id }}" tabindex="-1"
                aria-labelledby="bookModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bookModalLabel">📖 {{ $buku->judul_buku }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img id="modalBookImg" src="{{ asset('storage/' . $buku->cover_buku) }}"
                                class="img-fluid mb-3" style="max-height: 250px;">
                            <p>Ingin menambahkan buku ini ke Wishlist atau langsung meminjam?</p>
                            <p class="fw-bold fs-5 mb-3" style="color: #333;"><i class="bi bi-book"></i> Jumlah
                                Buku: <span class="badge bg-primary">{{ $buku->jumlah_buku }}</span></p>
                        </div>
                        <div class="modal-footer justify-content-center">
                            @if (!$wishlist->contains('buku_id', $buku->id))
                                <form action="{{ route('wishlist.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                    <button type="submit" class="btn btn-outline-primary">❤️ Tambah ke
                                        Wishlist</button>
                                </form>
                            @else
                                <form
                                    action="{{ route('wishlist.destroy', $wishlist->where('buku_id', $buku->id)->first()->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">💔 Hapus dari
                                        Wishlist</button>
                                </form>
                            @endif

                            <form action="{{ route('peminjaman.indexUser', $buku->id) }}">
                                <button class="btn btn-success" href="/peminjaman">📚 Pinjam Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <footer class="footer fixed-bottom mt-5 py-3 bg-dark text-white">
        <div class="container">
            <div class="text-center">
                <p class="mb-0">&copy; {{ date('Y') }} E-Library. All rights reserved.</p>
            </div>
        </div>
    </footer>


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

    @if (session('success_wishlist'))
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
                title: "Berhasil Menambahkan Wishlist! 🥰"
            });
        </script>
    @endif
    @if (session('destroy_wishlist'))
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
                title: "Dihapus dari Wishlist! 🥲"
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
