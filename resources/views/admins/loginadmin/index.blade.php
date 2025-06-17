<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Admin</title>
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
            color: #dc3545;
            user-select: none;
        }

        .tab.active {
            border-bottom: 2px solid #dc3545;
            color: #a71d2a;
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
            background-color: #dc3545;
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
            color: #dc3545;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <h4>Login Sebagai Admin</h4>
        <div class="tabs">
            <div class="tab active" id="tab-login">Login</div>
        </div>

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="email-login">Email</label>
                <input type="email" id="email-login" placeholder="admin@email.com" name="email" required />
            </div>
            <div class="input-group">
                <label for="password-login">Password</label>
                <input type="password" id="password-login" placeholder="Password" name="password" required />
            </div>
            @if ($errors->has('email'))
                <i class="alert alert-danger" style="color: red; font-size: 13px;">{{ $errors->first('email') }}</i>
            @endif
            <p class="small-text">Hanya untuk akses admin</p>
            <button class="button" type="submit">LOGIN ADMIN</button>
        </form>
    </div>

    

</body>

</html>
