<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Profil Admin</title>
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
            background-color: #dc3545;
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

    <div class="header-banner">
        <div style="margin-top: 20px 20px; margin-left: 20px;">
            <a href="/admin/dashboard" class="btn m-5 border-white" style="background-color: #d3d3d3;">
                <i style="margin-right: 8px;">←</i>
                <span style="font-size: 16px;">Kembali</span>
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
                    <form action="/logout/admin" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div class="container text-center mt-5">

        <img src="https://cdn.antaranews.com/cache/1200x800/2022/03/17/IMG_20220317_101822_292.jpg"
            class="profile-picture shadow" alt="Profile Picture">
        <h4 class="mt-2 mb-0 fw-bold">{{ Auth::guard('admin')->user()->name }}<span class="badge-pro">Adm</span>
            </h3>

            <i class="bi bi-pencil-square ms-2 text-muted" style="cursor:pointer;" title="Edit"></i>
        </h4>
        <p class="text-muted">{{ Auth::guard('admin')->user()->email }}</p>
    </div>
    <div class="d-flex justify-content-end mb-3">

        <div class="container mt-5">
            <div class="row justify-content-center">


                <div class="col-md-5 mb-4">
                    <div class="card shadow-sm rounded-4">
                        <div class="card-body text-center">
                            <h5 class="card-title">Kelola Peminjaman Buku</h5>
                            <p class="card-text">Pantau dan atur proses peminjaman buku oleh pengguna.</p>
                            <a href="/admin/kelolapinjam" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>


                <div class="col-md-5 mb-4">
                    <div class="card shadow-sm rounded-4">
                        <div class="card-body text-center">
                            <h5 class="card-title">Kelola Daftar Buku</h5>
                            <p class="card-text">Tambahkan, ubah, atau hapus koleksi buku pada e-library.</p>
                            <a href="/admin/kelolabuku" class="btn btn-success">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer py-3 bg-dark text-white fixed-bottom">
        <div class="text-center">
            <p class="mb-0">&copy; {{ date('Y') }} E-Library. All rights reserved.</p>
        </div>
    </footer>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
