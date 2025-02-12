<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>Tour & Travel Umroh Haji</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/LogoTitle.ico') }}">

    <!-- Font-Awesome (CSS) -->
    <link rel="stylesheet" href=" {{ asset('assets/vendors/font-awesome/css/all.css') }}">

    <!-- Magnific-Popup (CSS) -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/magnific-popup/magnific-popup.css') }}">

    <!-- Swiper (CSS) -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/swiper/swiper.css') }}">

    <!-- Custom Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>

<body>

    <!-- ==================== Scroll-Top Area (Start) ==================== -->
    <a href="#" class="scroll-top">
        <i class="fas fa-long-arrow-alt-up"></i>
    </a>
    <!-- ==================== Scroll-Top Area (End) ==================== -->



    <!-- ==================== Header Area (Start) ==================== -->
    <header>

        <!-- ===== Header Area (Start) ===== -->
        <div class="header">

            <div class="header-1">

                <!-- Logo -->
                <a class="logo" href="index.html">
                    <img src="/assets/images/Logo.png" alt="logo">
                    <div class="logo-name">
                    </div>
                </a>

                <ul class="header-contacts">
                    <li><i class="fas fa-phone"></i>
                        <h6>phone:</h6><span>+62 111 1111 1111</span>
                    </li>
                    <li><i class="fas fa-envelope"></i>
                        <h6>email:</h6><span class="gmail">informasi@dummyemail.com</span>
                    </li>
                </ul>

                <!-- Icons -->
                <div class="action">
                    <div class="icon-container">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" id="login" class="icon far fa-user" title="Login"></a>
                            @endif

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn">Register</a>
                            @endif
                        @else
                            <div class="dropdown-menu">
                                <button class="btn"> {{ Auth::user()->name }} <i class="fas fa-angle-down"></i> </button>

                                <div class="dropdown-content" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a href="#">Profile</a>
                                    <a href="{{ route('index_order') }}">Order</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>

            </div>

            <div class="header-2">

                <!-- Navbar -->
                <nav class="navbar">

                    <a class="nav-btn" href="{{ route('welcome') }}">Beranda</a>
                    <a class="nav-btn" href="{{ route('news.show') }}">Berita</a>
                    <a class="nav-btn" href="{{ route('welcome') }}#sertifikasi">Sertifikasi</a>

                    <div class="dropdown-menu">
                        <button class="nav-btn">Layanan <i class="fas fa-angle-down"></i> </button>
                        <div class="dropdown-content">
                            <a href="{{ route('umroh_service') }}">Umroh</a>
                            <a href="{{ route('haji_service') }}">Haji</a>
                            <a href="#">Private Umroh</a>
                            <a href="#">Tabungan</a>
                        </div>
                    </div>

                    <div class="dropdown-menu">
                        <button class="nav-btn">Galeri <i class="fas fa-angle-down"></i> </button>
                        <div class="dropdown-content">
                            <a href="{{ route('welcome') }}#galeri">Galeri</a>
                            <a href="{{ route('welcome') }}#testimoni">Testimoni</a>
                        </div>
                    </div>

                    <div class="dropdown-menu">
                        <button class="nav-btn">Informasi <i class="fas fa-angle-down"></i> </button>
                        <div class="dropdown-content">
                            <a href="#">Syarat Dokumen & Kententuan Pendaftaran</a>
                            <a href="#">Peraturan & Ketentuan Paket</a>
                            <a href="#">Syarat & Ketentuan Pembayaran / Pembatalan</a>
                            <a href="#">Kebijakan Privasi</a>
                            <a href="#">FAQ</a>
                        </div>
                    </div>

                    <a class="nav-btn" href="{{ route('welcome') }}#mitra">Mitra</a>

                    <a class="nav-btn" href="{{ route('kontak') }}">Hubungi Kami</a>
                </nav>

                <div id="menu-btn" class="icon fas fa-bars"></div>

            </div>

        </div>
        <!-- ===== Header Area (Ends) ===== -->

        <!-- ===== Mobile Menu Area (Start) ===== -->
        <div class="mobile-menu">

            <div id="close-side-bar" class="fas fa-times"></div>

            <nav class="mobile-navbar">

                <div class="nav-link">
                    <div class="main-nav-link"> <a class="nav-btn" href="{{ route('welcome') }}">home</a> </div>
                </div>
                <div class="nav-link">
                    <div class="main-nav-link"> <a class="nav-btn" href="{{ route('news.show') }}">home</a> </div>
                </div>
                <div class="nav-link">
                    <div class="main-nav-link"> <a class="nav-btn" href="{{ route('umroh_service') }}">Umroh</a>
                    </div>
                </div>

                <div class="nav-link">
                    <div class="main-nav-link"> <a class="nav-btn" href="{{ route('haji_service') }}">Haji</a></div>
                </div>
                <div class="nav-link">
                    <div class="main-nav-link"> <a class="nav-btn" a
                            href="{{ route('welcome') }}#sertifikasi">Sertifikasi</a></div>
                </div>
                <div class="nav-link">
                    <div class="main-nav-link"> <a class="nav-btn" a
                            href="{{ route('welcome') }}#testimoni">Testimoni</a></div>
                </div>
                <div class="nav-link">
                    <div class="main-nav-link"> <a class="nav-btn" a href="{{ route('welcome') }}#galeri">Galeri</a>
                    </div>
                </div>




                <div class="nav-link">
                    <div class="main-nav-link"> <a class="nav-btn" href="pages/Contact/contact.html">contact</a>
                    </div>
                </div>

            </nav>

        </div>
        <!-- ===== Mobile Menu Area (Ends) ===== -->

    </header>
    <!-- ==================== Header Area (End) ==================== -->


    <!-- ==================== Content Area (Start) ==================== -->

    <main class="py-4">
        @yield('content')
    </main>

    <a href="https://api.whatsapp.com/send?phone=081111111111&text=assalamualaikum warahmatullahi wabarakatuh"
        class="float" target="_blank">
        <i class="fab fa-whatsapp my-float"></i>
    </a>

    <!-- ==================== Content Area (End) ==================== -->


    <!-- ==================== Footer Area (Start) ==================== -->
    <footer class="footer">

        <div class="box-container">

            <div class="footer-item">
                <!-- Logo -->
                <a class="logo" href="../../index.html">
                    <img src="{{ asset('assets/images/Logo.png') }}" alt="logo">
                    <div class="logo-name">
                    </div>
                </a>
                <p>Kami menjalankan layanan Haji dan Umroh yang akan memberikan berbagai pilihan paket Haji dan Umroh
                    sesuai dengan kebutuhan umat.</p>
            </div>

            <div class="footer-item">
                <h2>Pelayanan Kami</h2>
                <div class="info links">
                    <p><a href="{{ route('umroh_service') }}">Umroh</a></p>
                    <p><a href="{{ route('haji_service') }}">Haji</a></p>
                    <p><a href="#">Private Umroh</a></p>
                    <p><a href="#">Tabungan Haji / Umroh</a></p>
                </div>
            </div>

            <div class="footer-item">
                <h2>Menu</h2>
                <div class="info links pages">
                    <div class="links-item">
                        <p><a href="{{ route('welcome') }}">Beranda</a></p>
                        <p><a href="{{ route('welcome') }}#about">Tentang Kami</a></p>
                        <p><a href="{{ route('welcome') }}#sertifikasi">Sertifikasi</a></p>
                        <p><a href="{{ route('welcome') }}#galeri">Galeri</a></p>
                        <p><a href="{{ route('welcome') }}#testimoni">Testimoni</a></p>
                    </div>

                </div>
            </div>

            <div class='footer-item'>
                <h2>Kontak info</h2>
                <div class="info">
                    <p><i class="fas fa-phone"></i><span>+62 22 2222 222</span></p>
                    <p><i class="fab fa-whatsapp"></i><span>+62 111 111 1111</span></p>
                    <p class="fas fa-envelope"></i><span class="gmail">informasi@dummyemail.com</span></p>
                    <p class="fas fa-envelope"></i><span class="gmail">admin@dummyemail.com</span></p>
                    <p><i class="fas fa-map"></i><span>Jakarta, Indonesia</span></p>
                </div>
                <div class="social">
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

        </div>

        <div class="content">
            <p><span>Umroh & Haji</span> | Tour Travel Indonesia</p>
        </div>

    </footer>
    <!-- ==================== Footer Area (End) ==================== -->

    <!-- Jquery -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="../../assets/vendors/jquery/jquery-3.6.0.js"></script>

    <!-- Custom Script Files -->
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/nav-link-toggler.js"></script>
    <script src="../../assets/js/Product-Gallery.js"></script>
    <script src="../../assets/js/quantity.js"></script>


</body>

</html>
