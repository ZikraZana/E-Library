<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

        <div class="container text-center mt-5">

            <img src="https://www.asianjunkie.com/wp-content/uploads/2019/10/AhnYujinProduce48.jpg"
                class="profile-picture shadow" alt="Profile Picture">
            <h4 class="mt-2 mb-0 fw-bold">Verena Louise<span class="badge-pro">PRO</span></h3>

                <i class="bi bi-pencil-square ms-2 text-muted" style="cursor:pointer;" title="Edit"></i>
            </h4>
            <p class="text-muted">ahnyujean@gmail.com</p>
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
                        <button class="btn btn-primary mt-3">Lainnya</button>
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
                        <button class="btn btn-primary mt-3">Lainnya</button>
                    </div>
                </div>

            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>
