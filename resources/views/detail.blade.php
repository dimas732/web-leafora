<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leafora</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/templates/ogani-master/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/templates/ogani-master/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/templates/ogani-master/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/templates/ogani-master/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/templates/ogani-master/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/templates/ogani-master/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/templates/ogani-master/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/templates/ogani-master/css/style.css" type="text/css">

    <style>
        .btn-login-green {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            background-color: #8BC34A;
            /* hijau */
            color: #fff;
            padding: 10px 22px;

            border-radius: 30px;
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;

            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .btn-login-green i {
            font-size: 14px;
        }

        .btn-login-green:hover {
            background-color: #7CB342;
            transform: translateY(-1px);
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ asset('templates/ogani-master/img/leafora.png') }}" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="header__top__right__auth">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn-login-green"><i
                                        class="fa-solid fa-arrow-right-from-bracket"></i>Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn-login-green">
                                <i class="fa fa-user"></i> Login
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('landing-page') }}"><img
                                src="{{ asset('templates/ogani-master/img/leafora.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{ route('landing-page') }}">Home</a></li>
                            <li><a href="{{ route('shop-grid') }}">Shop</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-bag"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Buah</a></li>
                            <li><a href="#">Sayur</a></li>
                            <li><a href="#">Lauk</a></li>
                            <li><a href="#">Bumbu</a></li>
                            <li><a href="#">Produk Fresh lain</a></li>
                            <li><a href="#">Bahan Pokok</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <!-- ===================== YIELD CONTENT ===================== -->
    @yield('content')
    <!-- ========================================================= -->


    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="#"><img src="{{ asset('templates/ogani-master/img/leafora.png') }}"
                                    alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Surabaya</li>
                            <li>Phone: +62 xxx</li>
                            <li>Email: leafora@gmail.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer__copyright__payment">
            <img src="{{ asset('templates/ogani-master/img/payment-item.png') }}" alt="">
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="/templates/ogani-master/js/jquery-3.3.1.min.js"></script>
    <script src="/templates/ogani-master/js/bootstrap.min.js"></script>
    <script src="/templates/ogani-master/js/jquery.nice-select.min.js"></script>
    <script src="/templates/ogani-master/js/jquery-ui.min.js"></script>
    <script src="/templates/ogani-master/js/jquery.slicknav.js"></script>
    <script src="/templates/ogani-master/js/mixitup.min.js"></script>
    <script src="/templates/ogani-master/js/owl.carousel.min.js"></script>
    <script src="/templates/ogani-master/js/main.js"></script>

    <script>
        const qtyInput = document.querySelector('input[name="quantity"]');
        const maxStock = {{ $product->stock }};

        qtyInput.addEventListener('input', function() {
            if (parseInt(this.value) > maxStock) {
                alert('Quantity melebihi stok tersedia!');
                this.value = maxStock;
            }
        });
    </script>

</body>

</html>
