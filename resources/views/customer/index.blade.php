@extends('layouts.customer.index')

@section('content')
<!-- Banner -->
<section id="hero-static" class="hero-static d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
        data-aos="zoom-out">
        <h2>Welcome to <span>Arena Futsal 77</span></h2>
        <div class="text-center ml-5 px-5">
            <p>Ingin bermain futsal dengan teman-teman atau komunitas? Sewa lapangan futsal di Futsal 77 saja! Kami
                menyediakan lapangan futsal berkualitas dengan harga terjangkau.
        </div>
        </p>
        <div class="d-flex">
            <a href="{{ route('book') }}" class="btn-get-started scrollto">Book Now</a>
        </div>
    </div>
</section>
<!-- End Banner -->

<!-- Main -->
<main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container">
            <div class="row gy-4">

                <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="service-item">
                        <div class="details position-relative">
                            <div class="icon text-center">
                                <img src="{{ asset('customer') }}\img\money.svg">
                            </div>
                            <a href="#" class="stretched-link text-center">
                                <h3>Pembayaran Mudah</h3>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="service-item">
                        <div class="details position-relative">
                            <div class="icon text-center">
                                <img src="{{ asset('customer') }}\img\discount.svg">
                            </div>
                            <a href="#" class="stretched-link text-center">
                                <h3>Banyak Promosi</h3>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="service-item">
                        <div class="details position-relative">
                            <div class="icon text-center">
                                <img src="{{ asset('customer') }}\img\fast.svg">
                            </div>
                            <a href="#" class="stretched-link text-center">
                                <h3>Layanan Cepat</h3>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-header">
                <h2>Contact Us</h2>
                <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad
                    dolores
                    adipisci aliquam.</p>
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
                        <h3>Get in touch</h3>
                        <p>Et id eius voluptates atque nihil voluptatem enim in tempore minima sit ad mollitia commodi
                            minus.</p>

                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>Location:</h4>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                </div>

                <div class="col-lg-8">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                    required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- End Contact Section -->

</main>
<!-- End #main -->
@endsection
