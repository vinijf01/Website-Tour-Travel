@extends('layouts.app')

@section('content')
    <!-- ==================== Page-Title (Start) ==================== -->
    <div class="page-title">

        <div class="title">
            <h2>Hubungi Kami</h2>
        </div>

        <div class="link">
            <span class="page">Reservasi, Pertanyaan, Keluhan? Hubungi Kami sekarang</span>
        </div>

    </div>

    <!-- ==================== Page-Title (End) ==================== -->




    <!-- ==================== Contact Area (Start) ==================== -->
    <section class="contact" id="contact">

        <!-- ========== Google Map (Start) ========== -->
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.478949799!2d106.829518!3d-6.2297465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1671696556084!5m2!1sid!2sid"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        <!-- ========== Google Map (End) ========== -->

        <div class="contact-container">

            <div class="box-container">

                <!-- ========== Contact Info (Start) ========== -->
                <div class="contact-info">

                    <h3>Kontak info</h3>

                    <div class="info-item">
                        <div class="intro">
                            <i class="fas fa-phone"></i>
                            <h4>Telp & Whatsapp</h4>
                        </div>
                        <div class="content">
                            <p>+62 21 22222222,</p>
                            <p>+62 23232323333</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="intro">
                            <i class="fas fa-clock"></i>
                            <h4>opening hours</h4>
                        </div>
                        <div class="content">
                            <p>mon - sat : 6am - 6pm,</p>
                            <p>sun : 8am - 4pm</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="intro">
                            <i class="fas fa-envelope"></i>
                            <h4>Email</h4>
                        </div>
                        <div class="content">
                            <p><a></i><span class="gmail">informasi@dummyemail.com</span></a></p>
                            <p><a></i><span class="gmail">admin@dummyemail.com</span></a></p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="intro">
                            <i class="fas fa-map-marker-alt"></i>
                            <h4>address</h4>
                        </div>
                        <div class="content">
                            <p>Jakarta, Indonesia</p>
                        </div>
                    </div>

                </div>
                <!-- ========== Contact Info (End) ========== -->


                <!-- ========== Contact Form (Start) ========== -->
                <form method="post" class="contact-form" id="contact-form">

                    <h3>get in touch</h3>

                    <input type="text" name="name" class="box" id="name" placeholder="name" required>
                    <input type="email" name="email" class="box" id="email" placeholder="email" required>
                    <input type="text" name="subject" class="box" id="subject" placeholder="subject" required>
                    <textarea cols="30" rows="10" name="comment" class="box" id="comment" placeholder="message"></textarea>

                    <button type="submit" class="btn" name="submit" id="submit">submit</button>

                    <span class="alert" id="msg"></span>

                </form>
                <!-- ========== Contact Form (End) ========== -->

            </div>

        </div>

    </section>
    <!-- ==================== Contact Area (End) ==================== -->
@endsection
