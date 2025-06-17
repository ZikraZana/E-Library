<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Profil Pengguna</title>
    <style>
        .header-banner {
            height: 150px;
            font-family: Arial, sans-serif;
            background-image: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .header {
            background-image: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 150px;
            position: relative;
            z-index: 1;
        }

        .profile-container {
            background: white;
            margin: -60px auto 0 auto;
            /* Naik ke atas */
            padding: 40px 20px 20px;
            width: 90%;
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .profile-section {
            position: relative;
            text-align: center;
            margin-top: 60px;
        }

        .profile-picture {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            position: absolute;
            top: 80px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }

        .name {
            font-size: 22px;
            font-weight: bold;
            margin-top: 15px;
            color: #333;
        }

        .email {
            color: #666;
            margin-top: 5px;
            font-size: 14px;
        }

        .badge-pro {
            background-color: #007bff;
            color: white;
            padding: 2px 6px;
            border-radius: 8px;
            font-size: 0.75em;
            margin-left: 4px;
        }

        .dropdown-toggle {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease-in-out;
        }

        .settings-dropdown {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 10;
        }

        .dropdown-toggle:hover {
            background-color: #f1f1f1;
        }

        .dropdown-menu {
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border: none;
            padding: 0.5rem 0;
        }

        .dropdown-item {
            padding: 10px 20px;
            font-size: 15px;
            transition: background 0.2s ease-in-out;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        .dropdown-item.text-danger:hover {
            background-color: #ffecec;
            color: #dc3545;
        }

        .stats {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            padding: 5px 0;
        }

        .stats div {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
        }

        .profile-header {
            display: flex;
            align-items: center;
        }

        .profile-pic {
            margin-right: 20px;
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }

        .profile-info {
            text-align: left;
        }

        .book-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .book-subtitle {
            font-size: 1.2rem;
        }

        .book-card {
            border: 1px solid #ced4da;
            border-radius: 10px;
            padding: 10px;
            text-align: left;
        }

        .wishlist {
            list-style: none;
            padding: 0;
        }

        .wishlist li {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <body>
        <div class="header-banner">
            <div style="margin-top: 20px 20px; margin-left: 20px;">
                <a href="/" style="text-decoration: none;">
                <button style="background-color: white; color: #007bff; font-size: 18px; border: none; border-radius: 5px; cursor: pointer;">
                    <h3>←</h3>
                </button>
                </a>
            </div>
            <div class="settings-dropdown dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Settings
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Tentang Akun</a></li>
                    <li><a class="dropdown-item" href="#">Pengaturan Privasi</a></li>
                    <li><a class="dropdown-item" href="#">Keamanan</a></li>
                    <li><a class="dropdown-item" href="#">Pesan</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container mt-5">

            <div class="text-center">

                <img src="https://www.asianjunkie.com/wp-content/uploads/2019/10/AhnYujinProduce48.jpg"
                    class="profile-picture shadow" alt="Profile Picture">


                <h4 class="mt-2 mb-0 fw-bold">
                    {{ Auth::user()->nama_lengkap }}
                    <span class="badge-pro">PRO</span>
                </h4>
                <p class="text-muted">{{ Auth::user()->email }}</p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning btn-sm rounded-pill px-3" data-bs-toggle="modal"
                    data-bs-target="#editProfileModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                    </svg>
                    Edit Profil
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <form action="{{ route('profileuser.update', $id = Auth::user()->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editProfileModalLabel">Edit Profil</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap"
                                        value="{{ Auth::user()->nama_lengkap }}">
                                    @error('nama_lengkap')
                                        <span class="invalid-feedback" role="alert">
                                            <i>{{ $message }}</i>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_hp" class="form-label">Nomor Handphone</label>
                                    <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp" name="nomor_hp"
                                        value="{{ Auth::user()->nomor_hp }}">
                                    @error('nomor_hp')
                                        <span class="invalid-feedback" role="alert">
                                            <i>{{ $message }}</i>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <div class="d-flex justify-content-end mb-3">



            <div class="container-fluid">
                <div class="stats">
                    <div style="width: 300px;">
                        <h3>20</h3>
                        <p>Kunjungan Perpustakaan</p>
                    </div>
                    <div style="width: 300px;">
                        <h3>50</h3>
                        <p>Buku Terpinjam</p>
                    </div>
                </div>

                <div class="container">

                    <div class="row mt-4">
                        <div class="col">
                            <h4>Buku yang dipinjam</h4>
                            <div class="card-group">
                                <div class="card book-card">
                                    <div class="card-body">
                                        <img src="https://ebooks.gramedia.com/ebook-covers/101102/image_highres/BLK_PIK1743140052515.jpg"
                                            alt="Buku" class="img-thumbnail mr-3" style="width: 100px;">
                                        <h5 class="card-title">Pengantar Ilmu Komputer</h5>
                                        <p class="card-text">PenaMuda Media</p>
                                    </div>
                                </div>
                                <div class="card book-card">
                                    <div class="card-body">
                                        <img src="https://ebooks.gramedia.com/ebook-covers/71503/image_highres/BLK_ML2022126897.jpg"
                                            alt="Buku" class="img-thumbnail mr-3" style="width: 100px;">
                                        <h5 class="card-title">Machine Learning</h5>
                                        <p class="card-text">Hugh Howey</p>
                                    </div>
                                </div>
                            </div>
                            <a href="/historiuser" class="btn btn-primary mt-3">Lainnya</a>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <h4>Wishlist</h4>
                            <div class="card-group">
                                <div class="card book-card">
                                    <div class="card-body">
                                        <img src="https://ebooks.gramedia.com/ebook-covers/62925/image_highres/BLK_BIASRKYE2021802223.jpg"
                                            alt="Buku" class="img-thumbnail mr-3" style="width: 100px;">
                                        <h5 class="card-title">Bicara Itu Ada Seninya</h5>
                                        <p class="card-text">Oh Su Hyang</p>
                                    </div>
                                </div>
                                <div class="card book-card">
                                    <div class="card-body">
                                        <img src="https://ebooks.gramedia.com/ebook-covers/76681/image_highres/BLK_MKPPK2022712040.jpg"
                                            alt="Buku" class="img-thumbnail mr-3" style="width: 100px;">
                                        <h5 class="card-title">Morfologi: Kajian Proses Pembentukan Kata</h5>
                                        <p class="card-text">Prof. Dr. Drs. I Wayan Simpen. M.Hum</p>
                                    </div>
                                </div>
                            </div>
                            <a href="/wishlist" class="btn btn-primary mt-3">Lainnya</a>
                        </div>
                    </div>
                </div>

            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

            @if ($errors->any())
                <script>
                    var editModal = new bootstrap.Modal(document.getElementById('editProfileModal'));
                    editModal.show();
                </script>
            @endif

    </body>

</html>
