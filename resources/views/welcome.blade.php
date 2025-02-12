@extends('layouts.app')

@section('content')
    <!-- ==================== Home-Slider Area (Start) ==================== -->
    @php
        $slide = DB::table('slide')->get();
    @endphp
    <section class="home">

        <div class="swiper-container home-slider">
            <div class="swiper-wrapper">

                @foreach ($slide as $item)
                    <div class="swiper-slide home-item">
                        <img src="{{ asset($item->gambar) }}" width="100">
                        <div class="content">
                            <div class="text">
                                <h3>Dan sesungguhnya masjid-masjid itu adalah untuk Allah. Maka janganlah kamu menyembah apa
                                    pun di dalamnya selain Allah.</h3>
                                <p>(SURAT AL-JIN AYAT 18)</p>
                                <a href="https://api.whatsapp.com/send?phone=08111111111&text=assalamualaikum warahmatullahi wabarakatuh"
                                    class="btn">contact us</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="swiper-pagination swiper-pagination1"></div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>
    <!-- ==================== Home-Slider Area (End) ==================== -->


    <!-- ==================== About Area (Start) ==================== -->
    <section class="about" id="about">
        @php
            $informasi = DB::table('informasi')->get();
        @endphp
        @foreach ($informasi as $item)
            <div class="heading">
                <div class="content">
                    <h2>{{ $item->judul }}</h2>
                    <div class="design">
                        <span></span>
                        <i class="fas fa-mosque"></i>
                        <span></span>
                    </div>
                </div>
            </div>

            <div class="box-container">


                <div class="image">
                    <div class="sub-image one">
                        <img src="{{ asset($item->gambar) }}" alt="">
                    </div>
                    <div class="sub-image two">
                        <img src="assets/images/About/About-2.jpeg" alt="">
                        <img src="assets/images/About/About-3.jpg" alt="">
                    </div>
                </div>

                <div class="content">

                    {!! $item->deskripsi !!}
        @endforeach
        </div>

        </div>

    </section>
    <!-- ==================== About Area (End) ==================== -->

    <!-- ==================== Why Us Area (Start) ==================== -->
    <section class="prayer-timing">

        <div class="heading transparent-bg">
            <div class="content">
                <h2>Mengapa Tour Travel Umroh Haji?</h2>
                <div class="design">
                    <span></span>
                    <i class="fas fa-mosque"></i>
                    <span></span>
                </div>
            </div>
        </div>

        <div class="box-container">
            @php
                $whyus = DB::table('why_us')->get();
            @endphp
            @foreach ($whyus as $item)
                <div class="prayer-item">
                    <center>
                        <h4>{{ $item->title }}</h4>
                        <ul class="content">
                            <li><span>{!! $item->description !!}</span></li>
                        </ul>
                    </center>
                </div>
            @endforeach
        </div>

    </section>

    <!-- ==================== Sertifikat (Start) ==================== -->
    <section class="blog main" id="sertifikasi">
        @php
            $sertifikasi = DB::table('sertifikasi')->get();
        @endphp
        <div class="heading">
            <div class="content">
                <h2>Sertifikasi</h2>
                <div class="design">
                    <span></span>
                    <i class="fas fa-mosque"></i>
                    <span></span>
                </div>
            </div>
        </div>
        <center>
            @foreach ($sertifikasi as $item)
                <img src="{{ asset($item->gambar) }}" alt="Blog-Image" height="150" width="180">
            @endforeach
    </section>
    <!-- ==================== Sertifikat (End) ==================== -->
    {{-- Berita --}}
    {{-- <section class="pillars" style="background: white">

        <div class="heading">
            <div class="content">
                <h2>Berita</h2>
                <div class="design">
                    <span></span>
                    <i class="fas fa-mosque"></i>
                    <span></span>
                </div>
            </div>
        </div>

        <div class="box-container">
            @php
                $news = DB::table('news')->paginate(4);
            @endphp
            @foreach ($news as $article)
                <div class="pillar-item">
                    <img src="{{ asset($article->gambar) }}" width="100%" height="50%">
                    <h4 style="font-size: 30px">{{ $article->judul }}</h4>
                    </a>
                    <div class="box">
                        <a href="{{ route('news.detail.news', $article->judul) }}" class="btn">Detail</a>
                    </div>
                </div>
            @endforeach

    </section> --}}
    {{-- END BERITA --}}

    {{-- Service --}}
    <section class="pillars">

        <div class="heading transparent-bg">
            <div class="content">
                <h2>Pelayanan Kami</h2>
                <div class="design">
                    <span></span>
                    <i class="fas fa-mosque"></i>
                    <span></span>
                </div>
            </div>
        </div>

        <div class="box-container">
            <div class="pillar-item">
                <a href="{{ route('haji_service') }}">
                    <h4 class="icon fas fa-kaaba"></h4>
                    <h4 id="service_text">Haji</h4>
                    <h4 id="service_text" style="font-size: 15px">Pelayanan perjalanan ibadah haji secara peofesional dan
                        amanah.</h4>
                </a>
            </div>

            <div class="pillar-item">
                <a href="{{ route('umroh_service') }}">
                    {{-- <h4><div class="icon"><i class="fas fa-kaaba"></i></div></h4> --}}
                    <h4 class="icon fas fa-kaaba"></h4>
                    <h4 id="service_text">Umroh</h4>
                    <h4 id="service_text" style="font-size: 15px"> perjalanan ibadah umroh secara peofesional dan amanah.
                    </h4>
                </a>
            </div>

            <div class="pillar-item">
                <a href="#">
                    <h4 class="icon fas fa-kaaba"></h4>
                    <h4 id="service_text">Private Umroh</h4>
                    <h4 id="service_text" style="font-size: 15px">Pelayanan perjalanan ibadah umroh secara ekslusif,
                        peofesional dan amanah.
                    </h4>
                </a>
            </div>

            <div class="pillar-item">
                <a href="#">
                    <h4 class="icon fas fa-kaaba"></h4>
                    <h4 id="service_text">Tabungan Haji / Umroh</h4>
                    <h4 id="service_text" style="font-size: 15px">Pelayanan tabungan bagi calon Jemaah haji ataupun umroh
                        yang langsung
                        terhubung dengan perbankan.</h4>
                </a>
            </div>
        </div>
    </section>
    {{-- Service END --}}



    <!-- ==================== Gallery Area (Start) ==================== -->
    <section class="gallery" id="galeri">
        @php
            $galeri = DB::table('galeri')->get();
        @endphp
        <div class="heading">
            <div class="content">
                <h2>Galeri</h2>
                <div class="design">
                    <span></span>
                    <i class="fas fa-mosque"></i>
                    <span></span>
                </div>
            </div>
        </div>

        <div class="box-container">
            @foreach ($galeri as $item)
                <div class="gallery-item image double Quran">
                    <img src="{{ asset($item->gambar) }}" alt="Gallery-Image">
                    <div class="content">
                        <div class="text">
                            <a href="{{ asset($item->gambar) }}"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- ==================== Gallery Area (End) ==================== -->

    <!-- ==================== Testimonials Area (Start) ==================== -->
    <section class="testimonial" id="testimoni">
        @php
            $testimoni = DB::table('testimoni')->get();
        @endphp
        <div class="heading">
            <div class="content">
                <h2>Testimoni</h2>
                <div class="design">
                    <span></span>
                    <i class="fas fa-mosque"></i>
                    <span></span>
                </div>
            </div>
        </div>

        <div class="swiper-container testimonial-slider">
            <div class="swiper-wrapper">

                <div class="swiper-slide testi-item">
                    <i class="fas fa-quote-right top-quote"></i>
                    <p>
                        @foreach ($testimoni as $item)
                            <i class="fas fa-quote-left"></i>
                            {{ $item->ket }}
                            <i class="fas fa-quote-right"></i>
                    </p>
                    <div class="text">
                        <h4>~ {{ $item->nama }} ~</h4>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination swiper-pagination2"></div>
        </div>
    </section>
    <!-- ==================== Testimonials Area (End) ==================== -->

    <!-- ==================== Blogs Area (Start) ==================== -->
    <section class="blog main" id="mitra">

        <div class="heading">
            <div class="content">
                <h2>Mitra</h2>
                <div class="design">
                    <span></span>
                    <i class="fas fa-mosque"></i>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="image">
            <center>
                @php
                    $mitra = DB::table('mitra')->get();
                @endphp
                @foreach ($mitra as $item)
                    <img src="{{ asset($item->gambar) }}" alt="Blog-Image" width="320" height="200">
                @endforeach
        </div>
    </section>
    <!-- ==================== Blogs Area (End) ==================== -->

    <!-- Jquery -->
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/vendors/jquery/jquery-3.6.0.js"></script>
    <!-- Magnific-Popup JS -->
    <script src="assets/vendors/magnific-popup/jquery.magnific-popup.js"></script>
    <!-- Swiper (JS) -->
    <script src="assets/vendors/swiper/swiper.js"></script>
    <!-- Custom Script Files -->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/nav-link-toggler.js"></script>
    <script src="assets/js/home-slider.js"></script>
    <script src="assets/js/gallery.js"></script>
    <script src="assets/js/counter-up.js"></script>
    <script src="assets/js/testi-slider.js"></script>
    </body>

    </html>
@endsection
