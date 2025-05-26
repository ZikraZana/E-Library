<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 320px;
            text-align: center;
        }

        .tabs {
            display: flex;
            margin-bottom: 20px;
        }

        .tab {
            flex: 1;
            padding: 10px 0;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            font-weight: bold;
            color: #007bff;
            user-select: none;
        }

        .tab.active {
            border-bottom: 2px solid #007bff;
            color: #0056b3;
        }

        form {
            text-align: left;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: black;
        }

        .input-group input {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button {
            background-color: #1273ed;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .small-text {
            font-size: 12px;
            margin-top: 10px;
            color: #1273ed;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <h4>Kamu belum login</h4>
        <div class="tabs">
            <div class="tab active" id="tab-login">Login</div>
            <div class="tab" id="tab-daftar">Daftar</div>
        </div>

        <form id="form-login">
            <div class="input-group">
                <label for="email-login">Email address</label>
                <input type="email" id="email-login" placeholder="Email" required />
            </div>
            <div class="input-group">
                <label for="password-login">Password</label>
                <input type="password" id="password-login" placeholder="Password" required />
            </div>
            <p class="small-text">Nikmati berbagai layanan perpustakaan setelah login</p>
            <button class="button" type="submit">LOGIN SEKARANG</button>
        </form>

        <form id="form-daftar" style="display: none;" action="{{ route('loginregister.index') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="nama-daftar">Nama Lengkap</label>
                <input type="text" id="nama-daftar" placeholder="Nama lengkap" name="nama_lengkap" />
                @error('nama_lengkap')
                    <span class="invalid-feedback" role="alert" style="color: red; font-size: 13px;">
                        <i>{{ $message }}</i>
                    </span>
                @enderror                
            </div>
            <div class="input-group">
                <label for="nomor-hp">Nomor HP</label>
                <input type="number" id="nomor-hp" placeholder="08xxxxxxxxxx" name="nomor_hp" />
                @error('nomor_hp')
                    <span class="invalid-feedback" role="alert" style="color: red; font-size: 13px;">
                        <i>{{ $message }}</i>
                    </span>
                @enderror 
            </div>
            <div class="input-group">
                <label for="email-daftar">Email address</label>
                <input type="email" id="email-daftar" placeholder="Email" name="email" />
                @error('email')
                    <span class="invalid-feedback" role="alert" style="color: red; font-size: 13px;">
                        <i>{{ $message }}</i>
                    </span>
                @enderror 
            </div>
            <div class="input-group">
                <label for="password-daftar">Password</label>
                <input type="password" id="password-daftar" placeholder="Password" name="password" />
                @error('password')
                    <span class="invalid-feedback" role="alert" style="color: red; font-size: 13px;">
                        <i>{{ $message }}</i>
                    </span>
                @enderror 
            </div>
            <p class="small-text">Nikmati berbagai layanan perpustakaan setelah daftar</p>
            <button class="button" type="submit">DAFTAR SEKARANG</button>
        </form>
    </div>

    <script>
        const tabLogin = document.getElementById('tab-login');
        const tabDaftar = document.getElementById('tab-daftar');
        const formLogin = document.getElementById('form-login');
        const formDaftar = document.getElementById('form-daftar');

        tabLogin.addEventListener('click', () => {
            tabLogin.classList.add('active');
            tabDaftar.classList.remove('active');
            formLogin.style.display = 'block';
            formDaftar.style.display = 'none';
        });

        tabDaftar.addEventListener('click', () => {
            tabDaftar.classList.add('active');
            tabLogin.classList.remove('active');
            formLogin.style.display = 'none';
            formDaftar.style.display = 'block';
        });
    </script>

</body>

</html>
