<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verify Account - LeaFora</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    {{-- CSS --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f6f7fb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .verify-box {
            background: #ffffff;
            padding: 40px;
            max-width: 450px;
            width: 100%;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .verify-box img {
            width: 120px;
            margin-bottom: 20px;
        }

        .verify-box h2 {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .verify-box p {
            font-size: 14px;
            color: #666;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            width: 100%;
            padding: 12px;
            border-radius: 30px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
        }

        .btn-primary {
            background: #4CAF50;
            color: #fff;
            margin-bottom: 15px;
        }

        .btn-primary:hover {
            background: #43a047;
        }

        .btn-link {
            background: none;
            color: #999;
            font-size: 13px;
            text-decoration: underline;
        }

        .alert {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 10px;
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="verify-box">
        {{-- LOGO --}}
        <img src="{{ asset('./templates/ogani-master/img/leafora.png') }}" alt="LeaFora">

        <h2>Verify Your Email</h2>

        <p>
            Thanks for signing up! Before continuing, please verify your email address
            by clicking the link we just sent to your inbox.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="alert">
                A new verification link has been sent to your email.
            </div>
        @endif

        {{-- RESEND EMAIL --}}
        <form method="POST” action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary">
                Resend Verification Email
            </button>
        </form>

        {{-- LOGOUT --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link">
                Log out
            </button>
        </form>
    </div>

</body>

</html>
