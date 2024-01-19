@extends('layouts.customer.index')

@section('content')
<!-- Main -->
<main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container mt-5">
            <div class="section-header">
                <h2>Contact Us</h2>
                <p>Terima kasih telah mengunjungi website kami. Berikut adalah maps lokasi kami!</p>
            </div>

        </div>

        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.1624470468687!2d105.9848157!3d-6.5011093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e4247241138060f%3A0xa85b89dd7c281af1!2sFutsal%2077!5e0!3m2!1sid!2sid!4v1704549162679!5m2!1sid!2sid"
                frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

        <div class="container">

            <div class="row gy-5 gx-lg-5">
                <div class="col-lg-4">

                    <div class="info">
                        <h3>Info Arena 77</h3>
                        <p>Jika Anda memiliki pertanyaan atau ingin melakukan
                            pemesanan, silakan hubungi kami melalui salah satu cara berikut:</p>

                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>Lokasi:</h4>
                                <p>Jln Raya Saketi Malingping KM 16 Kp. Cijolang,(Komplek Masjid Darussunnah, 77 Futsall) Cililitan, Picung, Pandeglang</p>
                            </div>
                        </div><!-- End Info Item -->

                        <!-- <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>
                        </div>End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h4>Call:</h4>
                                <p>08889689800</p>
                                <a href="https://wa.me/628889689800?text=Hallo%20saya%20igin%20menanyakan%20lapangan" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                </div>

                <div class="col-lg-8">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center rounded-lg"><button type="submit">Send Message</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- End Contact Section -->

</main>
<!-- End #main -->
@endsection
