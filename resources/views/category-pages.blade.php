<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Produk Buah - LeaFora</title>
    <link rel="stylesheet" href="/templates/ogani-master/Stylekategori.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="header__logo">
            <a href="{{ route('landing-page') }}">
                <img src="/templates/ogani-master/img/leafora.png" alt="LEAFORA">
                <span>LEAFORA</span>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('category-page.vegetables.index') }}">Sayur</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('category-page.protein.index') }}">Protein</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('category-page.fruit.index') }}">Buah</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('category-page.herbs.index') }}">Bumbu</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('category-page.staples.index') }}">Bahan
                        Pokok</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('category-page.others.index') }}">Produk
                        Lainnya</a></li>
            </ul>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="container mt-4">
        @yield('breadcrumb')
    </div>

    <!-- Produk Sayur -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-light text-center py-4 mt-5">
        <p>© 2025 LeaFora. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
