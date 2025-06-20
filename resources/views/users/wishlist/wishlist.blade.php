<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wishlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="container py-5">
        <div style="margin-top: 20px 20px; margin-left: 20px;">
            <a href="/" class="btn border-white" style="background-color: #d3d3d3;">
                <i style="margin-right: 8px;">←</i>
                <span style="font-size: 16px;">Kembali</span>
            </a>
        </div>
        <h2 class="text-center mb-4">❤️ My Wishlist</h2>

        @if (count($wishlist) > 0)
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4">
                @foreach ($wishlist as $item)
                    <div class="col">
                        <div class="card h-100" data-bs-toggle="modal" data-bs-target="#bookModal{{ $item->id }}"
                            data-title="{{ $item->buku->judul_buku }}"
                            data-img="{{ asset('storage/' . $item->buku->cover_buku) }}"
                            style="transition: transform 0.3s ease-in-out; cursor: pointer;"
                            onmouseover="this.style.transform='scale(1.05)'"
                            onmouseout="this.style.transform='scale(1)'">
                            <img src="{{ asset('storage/' . $item->buku->cover_buku) }}" class="card-img-top"
                                alt="Buku" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->buku->judul_buku }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center mt-4">
                <h4>Kamu belum memiliki wishlist</h4>
            </div>
            @endif @foreach ($wishlist as $item)
                <div class="modal fade" id="bookModal{{ $item->id }}" tabindex="-1"
                    aria-labelledby="bookModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content p-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bookModalLabel">📖 {{ $item->buku->judul_buku }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img id="modalBookImg" src="{{ asset('storage/' . $item->buku->cover_buku) }}"
                                    class="img-fluid mb-3" style="max-height: 250px;">
                                <p>Ini buku favoritmu 😆</p>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">💔 Hapus dari
                                        Wishlist</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

    </div>
    <footer class="footer fixed-bottom py-3 bg-dark text-white">
        <div class="text-center">
            <p class="mb-0">&copy; {{ date('Y') }} E-Library. All rights reserved.</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
