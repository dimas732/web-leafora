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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


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
            <a href="#"><img src="./templates/ogani-master/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="profile.html" class="profile-icon"><i class="fa fa-user-circle"></i></a></li>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
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
                <a href="login.html"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('landing-page') }}">Home</a></li>
                <li><a href="{{ route('shop-grid') }}">Shop</a></li>
                <li><a href="./contact.html">Contact</a></li>
                <li><a href="{{ route('about-us') }}">About Us</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        {{-- <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div> --}}
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
                            <li><a class="hv" style="color: #56ab2f" href="{{ route('landing-page') }}">Home</a>
                            </li>
                            <li class="active"><a class="hv" href="{{ route('shop-grid') }}">Shop</a></li>
                            <li><a class="hv" href="./contact.html">Contact</a></li>
                            <li><a class="hv" href="{{ route('about-us') }}">About Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            {{-- <li><a href="Profi_Pengguna.html"><i class="fa fa-user"></i></a></li> --}}
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
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>KATEGORI</span>
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
                                <h5>+62 331 789 101</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="./templates/ogani-master/img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="{{ route('shop-grid') }}" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->

    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    @yield('product-list1')
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="./templates/ogani-master/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="./templates/ogani-master/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/lp-1.jpg"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Bayam </h6>
                                        <span>Rp 2.000,00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/featured/ayam.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Ayam</h6>
                                        <span>Rp30.000,00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/garam.jpg"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Garam</h6>
                                        <span>Rp 2.500,00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/product/jahe.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Jahe</h6>
                                        <span>Rp 10.000,00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/lele.png"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Ikan Lele</h6>
                                        <span>Rp 26.000,00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/masakorenteng.jpg"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Masako ayam 1 renteng</h6>
                                        <span>Rp 6.000,00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/telur_ayam.png"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Telur ayam</h6>
                                        <span>Rp 27.500,00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/ceker-removebg-preview.png"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Ceker tanpa tulang</h6>
                                        <span>Rp 25.000,00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/Cabe-Rawit.jpg"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Cabe Rawit</h6>
                                        <span>Rp 23.500,00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/Tomato.jpg"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Tomat</h6>
                                        <span>Rp 8.000,00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/beras1kg.png"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Beras 1 kg</h6>
                                        <span>Rp 17.000,00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/minyakkita.jpg"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Minyak kita</h6>
                                        <span>Rp 14.000,00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/kangkung.jpg"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>kangkung</h6>
                                        <span>Kangkungnya seger, batangnya renyah. Tinggal tumis bawang putih aja udah
                                            enak.</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/ceker-removebg-preview.png"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Ceker tanpa tulang</h6>
                                        <span>Empuk, gurih alami, siap diolah tanpa repot buang tulang.</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/apel1.jpg"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Apel</h6>
                                        <span>Apel pilihan dengan rasa manis segar, tekstur renyah. Cocok dimakan
                                            langsung atau dijadikan jus</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/bawangmerah.jpg"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Bawang merah</h6>
                                        <span>Bawangnya kering, nggak banyak yang busuk. Aromanya kuat, masakan jadi
                                            wangi.</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/beraspandan.jpg"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Beras Pandan Wangi</h6>
                                        <span>Nasinya pulen, wangi. Enak dimakan pakai lauk apa aja.</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./templates/ogani-master/img/latest-product/kacangtanah.jpg"
                                            alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Kacang Tanah Kupas</h6>
                                        <span>Bersih, gampang digoreng. Cocok buat sambel kacang.</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    </section>
    <!-- Blog Section End -->

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
        $(document).ready(function() {
            var $grid = $(".featured__filter").isotope();

            $(".featured__controls li").on("click", function() {
                $(".featured__controls li").removeClass("active");
                $(this).addClass("active");

                var filterValue = $(this).attr("data-filter");
                $grid.isotope({
                    filter: filterValue
                });
            });
        });
    </script>

</body>

</html>
