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
    <link rel="stylesheet" href="./templates/ogani-master/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./templates/ogani-master/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./templates/ogani-master/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./templates/ogani-master/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./templates/ogani-master/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./templates/ogani-master/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./templates/ogani-master/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./templates/ogani-master/css/style.css" type="text/css">

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
            <a href="#"><img src="./templates/ogani-master/img/leafora.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
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
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('landing-page') }}">Home</a></li>
                <li><a href="{{ route('shop-grid') }}">Shop</a></li>
                <li><a href="./contact.html">Contact</a></li>
                <li><a href="./About Us.html">About Us</a></li>

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
                <li><i class="fa fa-envelope"></i> leafora@gmail.com</li>
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
                            <li class="active"><a class="hv" href="{{ route('shop-grid') }}">Shop</a></li>
                            <li><a class="hv" href="./contact.html">Contact</a></li>
                            <li><a class="hv" style="color: #56ab2f" href="./About Us.html">About Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            {{-- <li><a href="Profi_Pengguna.html"><i class="fa fa-user"></i></a></li> --}}
                            <li><a href="shoping-cart.html"><i class="fa fa-shopping-bag"></i></a></li>
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
                            <span>KATEGORI</span>
                        </div>
                        <ul>
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
                            <form action="#">
                                <div class="hero__search__categories">
                                    Semua Kategori
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="Apa yang anda butuhkan?">
                                <button type="submit" class="site-btn">CARI</button>
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
    <section class="breadcrumb-section set-bg" data-setbg="./templates/ogani-master/img/MAKANAN.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>About Us</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('landing-page') }}">Home</a>
                            <span>About Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- bagian about us -->
    <section class="about spad">
        <div class="container">
            <div class="row align-items-center">
                <!-- Teks -->
                <div class="col-lg-7 col-md-7">
                    <div class="about__text">
                        <h3>TENTANG KAMI</h3>
                        <p>
                            Kami adalah Toko Sayuran Modern yang menghadirkan teknologi lebih dekat dengan gaya hidup
                            sehat.
                            Berdiri pada 2 April 2024, Leafera hadir sebagai solusi modern untuk memenuhi kebutuhan
                            sayuran segar
                            dengan cara yang mudah, cepat, dan praktis.
                        </p>
                        <p>
                            Melalui website Leafera, pelanggan dapat memesan sayuran segar secara online dan beragam
                            buah-buahan, lauk pauk, bumbu dapur, bahan pokok, serta produk kelontong, memeriksa stok,
                            dan mengambil pesanan langsung di toko untuk memastikan kesegaran dan kualitas terbaik.
                        </p>

                        <div class="about__goals">
                            <div class="goal">
                                <h4>Visi</h4>
                                <p>
                                    Menjadi penyedia sayuran segar terpercaya yang mengutamakan kualitas, kemudahan
                                    layanan, dan kepuasan pelanggan
                                    melalui pemanfaatan teknologi digital.
                                </p>
                            </div>

                            <div class="goal">
                                <h4>Misi</h4>
                                <ul class="mission-list">
                                    <li>Memberikan kemudahan bagi masyarakat untuk berbelanja sayuran secara online
                                        tanpa terburu-buru.</li>
                                    <li>Mendukung petani lokal dengan memperluas jangkauan pemasaran produk mereka.</li>
                                    <li>Menyediakan produk berkualitas tinggi yang segar dan ramah lingkungan.</li>
                                    <li>Membangun pengalaman belanja yang modern, efisien, dan berkelanjutan.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gambar -->
                <div class="col-lg-5 col-md-5">
                    <div class="about__img">
                        <img src="./templates/ogani-master/img/anggota/gambaroabout.png" alt="About Us">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Services Section Begin -->
    <section class="services spad">
        <div class="container">
            <div class="section-title text-center">
                <h3>Our Services</h3>
                <h2>We Provide The Best Services</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="service__item">
                        <div class="icon">
                            <img src="./templates/ogani-master/img/banner/onlinepesan.png" alt="">
                        </div>
                        <h4>Pemesanan Online</h4>
                        <p>Nikmati kemudahan berbelanja sayuran segar langsung melalui website Leafora. Pelanggan dapat
                            memilih berbagai jenis sayuran, melihat ketersediaan stok, dan melakukan pemesanan kapan
                            saja tanpa perlu keluar rumah</p>
                        <p>→ Belanja jadi lebih cepat, mudah, dan praktis.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service__item">
                        <div class="icon">
                            <img src="./templates/ogani-master/img/banner/ambiltoko.jpg" alt="">
                        </div>
                        <h4>Ambil Langsung di Toko</h4>
                        <p>Untuk menjaga kesegaran produk, Leafora menerapkan sistem “pesan online, ambil di toko”.
                            Pelanggan dapat mengambil pesanan di waktu yang fleksibel tanpa harus terburu-buru atau
                            bangun pagi untuk berbelanja</p>
                        <p>→ Produk tetap segar, tanpa antri panjang.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service__item">
                        <div class="icon">
                            <img src="./templates/ogani-master/img/banner/petanilokal.jpg" alt="">
                        </div>
                        <h4>Dukungan untuk Petani Lokal</h4>
                        <p>Leafora bekerja sama dengan petani lokal untuk memastikan setiap produk yang dijual berasal
                            dari hasil panen terbaik. Melalui platform kami, petani mendapatkan akses pasar yang lebih
                            luas dan pelanggan memperoleh sayuran berkualitas tinggi</p>
                        <p>→ Belanja sehat sambil mendukung hasil bumi lokal.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Services Section End -->

    <!-- Our Team Section Begin -->
    <section class="team spad">
        <div class="container">
            <div class="section-title text-center">
                <h2>Our Team</h2>
                <p>Let's get to know group 7</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <div class="team__item__pic">
                            <img src="./templates/ogani-master/img/anggota/firna.jpg" alt="Firna Nakhwa Firdausi">
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="team__item__text">
                            <h5>Firna Nakhwa Firdausi</h5>
                            <span>24051214039</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <div class="team__item__pic">
                            <img src="./templates/ogani-master/img/anggota/tiara.jpg" alt="Tri Rizky Mutiara S">
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="team__item__text">
                            <h5>Tri Rizky Mutiara S</h5>
                            <span>24051214068r</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <div class="team__item__pic">
                            <img src="./templates/ogani-master/img/anggota/Dimbi.jpg" alt="Dimas Albi Sutrisno">
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="team__item__text">
                            <h5>Dimas Albi Sutrisno</h5>
                            <span>24051214070</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
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



</body>

</html>
