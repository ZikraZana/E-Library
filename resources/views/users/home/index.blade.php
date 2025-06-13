<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            <input type="text" class="form-control search-bar" placeholder="Cari buku...">
        </div>
    </div>

    <div class="container mt-4">
        <div class="kategori-container">
            <button class="btn btn-primary kategori-button">Informatika</button>
            <button class="btn btn-primary kategori-button">Sejarah</button>
            <button class="btn btn-primary kategori-button">Ilmiah</button>
            <button class="btn btn-primary kategori-button">Kedokteran</button>
            <button class="btn btn-primary kategori-button">Hukum</button>
            <button class="btn btn-primary kategori-button">Manajemen</button>
            <button class="btn btn-primary kategori-button">Sains</button>
            <button class="btn btn-primary kategori-button">Politik</button>
            <button class="btn btn-primary kategori-button">Sastra</button>

            <div class="dropdown m-1">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="lainnyaDropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lainnya
                </button>
                <div class="dropdown-menu" aria-labelledby="lainnyaDropdown">
                    <a class="dropdown-item" href="#">Novel</a>
                    <a class="dropdown-item" href="#">Psikologi</a>
                    <a class="dropdown-item" href="#">Teknik</a>
                    <a class="dropdown-item" href="#">Informatika</a>
                    <a class="dropdown-item" href="#">Pendidikan</a>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <h4 class="mt-4">Rekomendasi</h4>
            <a href="/daftarbuku" class="mt-3" style="text-decoration: underline !important;">Lihat Semua</a>
        </div>
        <div class="row">

            <div class="col">
                <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
                    data-title="Ilmu Kedokteran Forensik"
                    data-img="https://ebooks.gramedia.com/ebook-covers/64810/image_highres/BLK_IKF2021198695.jpg">
                    <img src="https://ebooks.gramedia.com/ebook-covers/64810/image_highres/BLK_IKF2021198695.jpg"
                        class="card-img-top" alt="Buku">
                    <div class="card-body">
                        <h5 class="card-title">Ilmu Kedokteran Forensik</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
                    data-title="Pengantar Ilmu Hukum"
                    data-img="https://cdn.gramedia.com/uploads/picture_meta/2024/4/5/nzqr3ahwlvvl7twj4y9tx7.jpg">
                    <img src="https://cdn.gramedia.com/uploads/picture_meta/2024/4/5/nzqr3ahwlvvl7twj4y9tx7.jpg"
                        class="card-img-top" alt="Buku">
                    <div class="card-body">
                        <h5 class="card-title">Pengantar Ilmu Hukum</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
                    data-title="Sejarah Dunia Lengkap"
                    data-img="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqGr0eI-vLV3EJoQ-6mMnV0rJpqNWDVVdN_A&s.jgp">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqGr0eI-vLV3EJoQ-6mMnV0rJpqNWDVVdN_A&s.jgp"
                        class="card-img-top" alt="Buku">
                    <div class="card-body">
                        <h5 class="card-title">Sejarah Dunia Lengkap</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal" data-title="Manajemen Teknik"
                    data-img="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeOf6UjXYYq1aoTEEjazojFFee62gsxUS18A&s.jpg">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeOf6UjXYYq1aoTEEjazojFFee62gsxUS18A&s.jpg"
                        class="card-img-top" alt="Buku">
                    <div class="card-body">
                        <h5 class="card-title">Manajemen Teknik</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
                    data-title="Pengantar Teknologi Informasi"
                    data-img="https://deepublishstore.com/wp-content/uploads/2018/01/Pengantar-Teknologi-Informasi-depan1.jpg">
                    <img src="https://deepublishstore.com/wp-content/uploads/2018/01/Pengantar-Teknologi-Informasi-depan1.jpg"
                        class="card-img-top" alt="Buku">
                    <div class="card-body">
                        <h5 class="card-title">Pengantar Teknologi Informasi</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
                    data-title="Menulis Esai Berbahasa Inggris Itu Mudah"
                    data-img="https://deepublishstore.com/wp-content/uploads/2022/01/Menulis-Esai-Berbahasa-Inggris_Fuad-80gr-Convert-Depan-1200x1781.jpg">
                    <img src="https://deepublishstore.com/wp-content/uploads/2022/01/Menulis-Esai-Berbahasa-Inggris_Fuad-80gr-Convert-Depan-1200x1781.jpg"
                        class="card-img-top" alt="Buku">
                    <div class="card-body">
                        <h5 class="card-title">Menulis Esai Berbahasa Inggris Itu Mudah</h5>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookModalLabel">📖 Judul Buku</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup"
                            style="font-size: 32px; border: none; background: none;">×</button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalBookImg" src="" class="img-fluid mb-3" style="max-height: 250px;">
                        <p>Ingin menambahkan buku ini ke Wishlist atau langsung meminjam?</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button class="btn btn-outline-primary">❤️ Tambah ke Wishlist</button>
                        <form action="{{ route('peminjaman') }}" method="GET">
                            <button class="btn btn-success">📚 Pinjam Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


        <script>
            const bookModal = document.getElementById('bookModal');
            bookModal.addEventListener('show.bs.modal', function(event) {
                const card = event.relatedTarget;
                const title = card.getAttribute('data-title');
                const imgSrc = card.getAttribute('data-img');

                const modalTitle = bookModal.querySelector('.modal-title');
                const modalImg = bookModal.querySelector('#modalBookImg');

                modalTitle.textContent = '📖 ' + title;
                modalImg.src = imgSrc;
            });
        </script>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
