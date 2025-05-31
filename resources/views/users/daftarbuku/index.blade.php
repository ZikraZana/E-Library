<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Buku</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: white;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      margin: 0;
      padding: 0;
      min-height: 100vh;
    }
    .container {
      padding-top: 50px;
    }
    .card {
      height: 100%;
      cursor: pointer;
      transition: transform 0.2s ease;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      min-height: 350px;
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
  </style>
</head>
<body>

  <div class="container">
    <h2 class="text-center fw-bold mb-4">📚 Daftar Buku</h2>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4">

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Ilmu Kedokteran Forensik"
             data-img="https://ebooks.gramedia.com/ebook-covers/64810/image_highres/BLK_IKF2021198695.jpg">
          <img src="https://ebooks.gramedia.com/ebook-covers/64810/image_highres/BLK_IKF2021198695.jpg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Ilmu Kedokteran Forensik</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Pengantar Ilmu Hukum"
             data-img="https://cdn.gramedia.com/uploads/picture_meta/2024/4/5/nzqr3ahwlvvl7twj4y9tx7.jpg">
          <img src="https://cdn.gramedia.com/uploads/picture_meta/2024/4/5/nzqr3ahwlvvl7twj4y9tx7.jpg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Pengantar Ilmu Hukum</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Sejarah Dunia Lengkap"
             data-img="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqGr0eI-vLV3EJoQ-6mMnV0rJpqNWDVVdN_A&s.jgp">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqGr0eI-vLV3EJoQ-6mMnV0rJpqNWDVVdN_A&s.jgp" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Sejarah Dunia Lengkap</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Manajemen Teknik"
             data-img="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeOf6UjXYYq1aoTEEjazojFFee62gsxUS18A&s.jpg">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeOf6UjXYYq1aoTEEjazojFFee62gsxUS18A&s.jpg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Manajemen Teknik</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Pengantar Teknologi Informasi"
             data-img="https://deepublishstore.com/wp-content/uploads/2018/01/Pengantar-Teknologi-Informasi-depan1.jpg">
          <img src="https://deepublishstore.com/wp-content/uploads/2018/01/Pengantar-Teknologi-Informasi-depan1.jpg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Pengantar Teknologi Informasi</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Menulis Esai Berbahasa Inggris Itu Mudah"
             data-img="https://deepublishstore.com/wp-content/uploads/2022/01/Menulis-Esai-Berbahasa-Inggris_Fuad-80gr-Convert-Depan-1200x1781.jpg">
          <img src="https://deepublishstore.com/wp-content/uploads/2022/01/Menulis-Esai-Berbahasa-Inggris_Fuad-80gr-Convert-Depan-1200x1781.jpg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Menulis Esai Berbahasa Inggris Itu Mudah</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Metode Penelitian Teknik Industri"
             data-img="https://sumalaba.com/wp-content/uploads/2023/01/COVER-721x1024.jpg">
          <img src="https://sumalaba.com/wp-content/uploads/2023/01/COVER-721x1024.jpg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Metode Penelitian Teknik Industri</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Kamus Lengkap Kedokteran"
             data-img="https://cdn.gramedia.com/uploads/items/Kamus_Lengkap_Kedokteran.jpg">
          <img src="https://cdn.gramedia.com/uploads/items/Kamus_Lengkap_Kedokteran.jpg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Kamus Lengkap Kedokteran</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Hukum Administrasi Negara"
             data-img="https://deepublishstore.com/wp-content/uploads/2018/05/Hukum-Administrasi-Negara-rev-1.0-Nuraisyah-Convert-depan1.jpg">
          <img src="https://deepublishstore.com/wp-content/uploads/2018/05/Hukum-Administrasi-Negara-rev-1.0-Nuraisyah-Convert-depan1.jpg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Hukum Administrasi Negara</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Sistem Informasi Manajemen"
             data-img="https://api.penerbitsalemba.com/book/books/02-0263/images/220f0bdb-ab50-45b1-991a-baeb034137b6.jpg">
          <img src="https://api.penerbitsalemba.com/book/books/02-0263/images/220f0bdb-ab50-45b1-991a-baeb034137b6.jpg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Sistem Informasi Manajemen</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Keamanan Sistem Informasi"
             data-img="https://penerbit.stekom.ac.id/public/journals/12/article_147_cover_en_US.jpg">
          <img src="https://penerbit.stekom.ac.id/public/journals/12/article_147_cover_en_US.jpg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Keamanan Sistem Informasi</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Manajemen Risiko dalam Industri"
             data-img="https://cdn.gramedia.com/uploads/items/manajemen_risiko_kvRU5dc.jpg">
          <img src="https://cdn.gramedia.com/uploads/items/manajemen_risiko_kvRU5dc.jpg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Manajemen Risiko dalam Industri</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Ilmu Kedokteran Forensik & Medikolegal"
             data-img="https://cdn.gramedia.com/uploads/items/9789797698317_ILMU-KEDOKTER.jpg">
          <img src="https://cdn.gramedia.com/uploads/items/9789797698317_ILMU-KEDOKTER.jpg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Ilmu Kedokteran Forensik & Medikolegal</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Machine Learning"
             data-img="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlf0nBqgx884AnqIXxLfb20AoWYoWucBWLzg&s.jpg">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlf0nBqgx884AnqIXxLfb20AoWYoWucBWLzg&s.jpg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Machine Learning</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Statistika Dasar"
             data-img="https://store.penerbitwidina.com/wp-content/uploads/2023/10/WhatsApp-Image-2023-10-11-at-14.25.39.jpeg">
          <img src="https://store.penerbitwidina.com/wp-content/uploads/2023/10/WhatsApp-Image-2023-10-11-at-14.25.39.jpeg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Statistika Dasar</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Pengantar Manajemen"
             data-img="https://deepublishstore.com/wp-content/uploads/2022/08/p-manajemen-3.png">
          <img src="https://deepublishstore.com/wp-content/uploads/2022/08/p-manajemen-3.png" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Pengantar Manajemen</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Perancangan Sistem Informasi dan Aplikasinya"
             data-img="https://s3.amazonaws.com/assets.unprimdn.ac.id/images/library_books/59753/59753-thumb.jpg">
          <img src="https://s3.amazonaws.com/assets.unprimdn.ac.id/images/library_books/59753/59753-thumb.jpg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Perancangan Sistem Informasi dan Aplikasinya</h5>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal"
             data-title="Filsafat Keadilan"
             data-img="https://cdn.gramedia.com/uploads/items/9786232185296.jpg">
          <img src="https://cdn.gramedia.com/uploads/items/9786232185296.jpg" class="card-img-top" alt="Buku">
          <div class="card-body">
            <h5 class="card-title">Filsafat Keadilan</h5>
          </div>
        </div>
      </div>

    </div>

    <div class="text-center mt-4">
      <a href="home" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
  </div>

  <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-3">
        <div class="modal-header">
          <h5 class="modal-title" id="bookModalLabel">📖 Judul Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body text-center">
          <img id="modalBookImg" src="" class="img-fluid mb-3" style="max-height: 250px;">
          <p>Ingin menambahkan buku ini ke Wishlist atau langsung meminjam?</p>
        </div>
        <div class="modal-footer justify-content-center">
          <button class="btn btn-outline-primary">❤️ Tambah ke Wishlist</button>
          <button class="btn btn-success">📚 Pinjam Sekarang</button>
        </div>
      </div>
    </div>
  </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  
  <script>
    const bookModal = document.getElementById('bookModal');
    bookModal.addEventListener('show.bs.modal', function (event) {
      const card = event.relatedTarget;
      const title = card.getAttribute('data-title');
      const imgSrc = card.getAttribute('data-img');

      const modalTitle = bookModal.querySelector('.modal-title');
      const modalImg = bookModal.querySelector('#modalBookImg');

      modalTitle.textContent = '📖 ' + title;
      modalImg.src = imgSrc;
    });
  </script>

</body>
</html>
