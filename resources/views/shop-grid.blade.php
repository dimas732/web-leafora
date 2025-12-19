<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('./templates/ogani-master/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./templates/ogani-master/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./templates/ogani-master/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./templates/ogani-master/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./templates/ogani-master/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./templates/ogani-master/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./templates/ogani-master/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./templates/ogani-master/css/style.css') }}" type="text/css">

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
            <a href="{{ route('landing-page') }}"><img src="./templates/ogani-master/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="./templates/ogani-master/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="{{ route('landing-page') }}">Home</a></li>
                <li class="active"><a href="./shop-grid.html">Shop</a></li>
                <li><a href="./contact.html">Contact</a></li>
                <li><a href="{{ route('about-us') }}">About Us</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
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
                                <button class="btn-login-green">Logout</button>
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
                        <a href="{{ route('landing-page') }}"><img src="./templates/ogani-master/img/leafora.png"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a class="hv" href="{{ route('landing-page') }}">Home</a>
                            </li>
                            <li><a class="hv" style="color: #56ab2f" href="./shop-grid.html">Shop</a></li>
                            <li><a class="hv" href="./contact.html">Contact</a></li>
                            <li><a class="hv" href="{{ route('about-us') }}">About Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="Profi_Pengguna.html"><i class="fa fa-user"></i></a></li>
                            <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-bag"></i></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
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
                            <span> KATEGORI </span>
                        </div>
                        <ul>
                            <li><a href="{{ route('category-page.fruit.index') }}">Buah</a></li>
                            <li><a href="{{ route('category-page.vegetables.index') }}">Sayur</a></li>
                            <li><a href="{{ route('category-page.protein.index') }}">Protein</a></li>
                            <li><a href="{{ route('category-page.herbs.index') }}">Bumbu</a></li>
                            <li><a href="{{ route('category-page.others.index') }}">Produk Fresh lain</a></li>
                            <li><a href="{{ route('category-page.staples.index') }}">Bahan Pokok</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{ route('shop-grid') }}" method="GET">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>

                                <input type="text" name="q" placeholder="What do you need?"
                                    value="{{ request('q') }}">

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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="./templates/ogani-master/img/Market.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>LeaFora Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('landing-page') }}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>KATEGORI</h4>
                            <ul>
                                <li><a href="{{ route('category-page.fruit.index') }}">Buah</a></li>
                                <li><a href="{{ route('category-page.vegetables.index') }}">Sayur</a></li>
                                <li><a href="{{ route('category-page.protein.index') }}">Protein</a></li>
                                <li><a href="{{ route('category-page.herbs.index') }}">Bumbu</a></li>
                                <li><a href="{{ route('category-page.others.index') }}">Produk Fresh lain</a></li>
                                <li><a href="{{ route('category-page.staples.index') }}">Bahan Pokok</a></li>
                            </ul>
                        </div>
                        @yield('price-range')
                        @yield('latest-product')
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        {{-- <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div> --}}
                        <div class="row">
                            @yield('grid-list1')
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            @yield('count-item')
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @yield('grid-list2')
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ route('landing-page') }}"><img src="./templates/ogani-master/img/leafora.png"
                                    alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Jl. Ketintang, Kec. Gayungan, Kota Surabaya, Jawa Timur 60231</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: leafora@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="{{ route('about-us') }}">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i
                                    class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img
                                src="./templates/ogani-master/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="./templates/ogani-master/js/jquery-3.3.1.min.js"></script>
    <script src="./templates/ogani-master/js/bootstrap.min.js"></script>
    <script src="./templates/ogani-master/js/jquery.nice-select.min.js"></script>
    <script src="./templates/ogani-master/js/jquery-ui.min.js"></script>
    <script src="./templates/ogani-master/js/jquery.slicknav.js"></script>
    <script src="./templates/ogani-master/js/mixitup.min.js"></script>
    <script src="./templates/ogani-master/js/owl.carousel.min.js"></script>
    <script src="./templates/ogani-master/js/main.js"></script>

    <script>
        var rangeMin = $(".price-range").data("min");
        var rangeMax = $(".price-range").data("max");

        $(".price-range").slider({
            range: true,
            min: rangeMin,
            max: rangeMax,
            values: [rangeMin, rangeMax],
            slide: function(event, ui) {
                $("#minamount").val(ui.values[0]);
                $("#maxamount").val(ui.values[1]);
            },
            change: function(event, ui) {
                // otomatis submit ketika slider digeser
                $("#priceFilterForm").submit();
            }
        });

        $("#minamount").val($(".price-range").slider("values", 0));
        $("#maxamount").val($(".price-range").slider("values", 1));
    </script>



</body>

</html>
