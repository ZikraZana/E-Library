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
        <div class="row align-items-center mb-4">
            <div class="col-auto">
                <a href="/" class="btn border-white" style="background-color: #d3d3d3;">
                    <i style="margin-right: 8px;">←</i>
                    <span style="font-size: 16px;">Kembali</span>
                </a>
            </div>

            <div class="col text-center">
                <h2 class="fw-bold mb-0">📚 Daftar Buku</h2>
            </div>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4">
                @foreach ($daftarbuku as $buku)
                    <div class="col">
                        <div class="card" data-bs-toggle="modal" data-bs-target="#bookModal{{ $buku->id }}"
                            data-title="{{ $buku->judul_buku }}" data-img="{{ asset('storage/' . $buku->cover_buku) }}">
                            <img src="{{ asset('storage/' . $buku->cover_buku) }}" class="card-img-top" alt="Buku">
                            <div class="card-body">
                                <h5 class="card-title">{{ $buku->judul_buku }}</h5>
                            </div>
                        </div>
                    </div>
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
                                    @endif
                                    <form action="{{ route('peminjaman.storeUser', $buku->id) }}">
                                        <button class="btn btn-success" href="/peminjaman">📚 Pinjam Sekarang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <footer class="footer mt-5 py-3 bg-dark text-white">
        <div class="text-center">
            <p class="mb-0">&copy; {{ date('Y') }} E-Library. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>


</body>

</html>
