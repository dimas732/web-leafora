<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - LeaFora</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('./templates/ogani-master/css/login.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        .btn-google {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            border-radius: 6px;
            border: 1px solid #ddd;
            background: white;
            color: #444;
            font-weight: 500;
            text-decoration: none;
        }

        .btn-google:hover {
            background: #f5f5f5;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-box">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('./templates/ogani-master/img/leafora.png') }}" alt="LeaFora Logo">
                </a>
            </div>

            <h2>Login to LeaFora</h2>

            {{-- ERROR MESSAGE --}}
            @if ($errors->any())
                <div class="alert-error">
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- FORM LOGIN BREEZE --}}
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email"
                        value="{{ old('email') }}" required autofocus>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="btn-login">
                    Login
                </button>

                <!-- Divider -->
                <div class="divider">
                    <span>or</span>
                </div>

                <a href="{{ route('google.login') }}" class="btn-google">
                    <img src="https://developers.google.com/identity/images/g-logo.png" width="18">
                    Login with Google
                </a>
            </form>

            <p class="signup-text">
                Don't have an account?
                <a href="{{ route('register') }}">Sign up</a>
            </p>
        </div>
    </div>

</body>

</html>
