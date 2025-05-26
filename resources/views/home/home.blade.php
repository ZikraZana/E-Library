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
            padding: 40px;
            border-radius: 8px;
            width: 80%;
            max-width: 700px;
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
        .card-img-top {
            height: 220px;
            object-fit: cover;
        }
        .card-title {
            font-size: 16px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div style="position: absolute; top: 20px; right: 20px;">
    <a href="login.html" class="text-light d-flex align-items-center login-link">
        <span class="mr-1">👤</span> Login</a>
    </div>

    <div class="header text-center">
        <div class="overlay">
        <h2>Mau baca buku apa hari ini?</h2>
        <input type="text" class="form-control search-bar" placeholder="Cari buku...">
    </div>
    </div>

    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <button class="btn btn-primary">Informatika</button>
            <button class="btn btn-primary">Sejarah</button>
            <button class="btn btn-primary">Ilmiah</button>
            <button class="btn btn-primary">Kedokteran</button>
            <button class="btn btn-primary">Hukum</button>
            <button class="btn btn-primary">Manajemen</button>
            <button class="btn btn-primary">Sains</button>
            <button class="btn btn-primary">Politik</button>
            <button class="btn btn-primary">Sastra</button>
            <button class="btn btn-primary">Lainnya</button>
        </div>

        <h4 class="mt-4">Rekomendasi</h4>
        <div class="row">
            <div class="col-md-2 d-flex">
                <div class="card">
                    <img src="https://deepublishstore.com/wp-content/uploads/2020/05/Dasar-dasar-Teknik-Informatika_Novega-Pratama-rev-1.0-depan-scaled.jpg" class="card-img-top" alt="Buku 1">
                    <div class="card-body">
                        <h5 class="card-title">Dasar-Dasar Teknik Informatika</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-2 d-flex">
                <div class="card">
                    <img src="https://ebooks.gramedia.com/ebook-covers/64810/image_highres/BLK_IKF2021198695.jpg" class="card-img-top" alt="Buku 2">
                    <div class="card-body">
                        <h5 class="card-title">Ilmu Kedokteran Forensik</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-2 d-flex">
                <div class="card">
                    <img src="https://cdn.gramedia.com/uploads/picture_meta/2024/4/5/nzqr3ahwlvvl7twj4y9tx7.jpg" class="card-img-top" alt="Buku 3">
                    <div class="card-body">
                        <h5 class="card-title">Pengantar Ilmu Hukum</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-2 d-flex">
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqGr0eI-vLV3EJoQ-6mMnV0rJpqNWDVVdN_A&s.jgp" class="card-img-top" alt="Buku 4">
                    <div class="card-body">
                        <h5 class="card-title">Sejarah Dunia Lengkap</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-2 d-flex">
                <div class="card">
                    <img src="https://bintangpusnas.perpusnas.go.id/api/getImage/978-623-02-1674-9.jpg" class="card-img-top" alt="Buku 5">
                    <div class="card-body">
                        <h5 class="card-title">Manajemen Teknik</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-2 d-flex">
                <div class="card">
                    <img src="https://deepublishstore.com/wp-content/uploads/2018/01/Pengantar-Teknologi-Informasi-depan1.jpg" class="card-img-top" alt="Buku 6">
                    <div class="card-body">
                        <h5 class="card-title">Pengantar Teknologi Informasi</h5>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-link mt-3">Lihat Semua</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
