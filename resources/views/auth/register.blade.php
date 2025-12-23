<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up - LeaFora</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSS --}}
    <link rel="stylesheet" href="./templates/ogani-master/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

    <div class="login-container">
        <div class="login-box">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="./templates/ogani-master/img/leafora.png" alt="LeaFora Logo">
                </a>
            </div>

            <h2>Create Your Account</h2>

            {{-- ERROR MESSAGE --}}
            @if ($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORM REGISTER BREEZE --}}
            <form method="POST" action="{{ route('register') }}" class="login-form">
                @csrf

                <div class="input-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        placeholder="Your full name" required>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        placeholder="Enter your email" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Create a password" required>
                </div>

                <div class="input-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Re-enter your password" required>
                </div>

                <button type="submit" class="btn-login">
                    Sign Up
                </button>
            </form>

            <p class="signup-text">
                Already have an account?
                <a href="{{ route('login') }}">Login</a>
            </p>
        </div>
    </div>

</body>

</html>
