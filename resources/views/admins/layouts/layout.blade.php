<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark px-3">
        <span class="navbar-brand mb-0 h1">Perpustakaan Admin</span>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
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
        </form>
    </nav>

    <div class="container mt-4" style="min-height: calc(100vh - 160px);">
        @yield('content')
    </div>
    <footer class="footer py-3 bg-dark text-white fixed-bottom">
        <div class="text-center">
            <p class="mb-0">&copy; {{ date('Y') }} E-Library. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
