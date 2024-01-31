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
    <section id="profile" class="profile">
        <div class="container">

            <div class="section-header">
                <h2>About Us</h2>
            </div>

            <div id="carouselExampleCaptions" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                        aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active"
                        style="background-image: url({{ asset('customer') }}/img/lapangan-luar.jpg)">
                    </div>
                    <div class="carousel-item"
                        style="background-image: url({{ asset('customer') }}/img/lapangan-luar2.jpg)">
                    </div>
                    <div class="carousel-item"
                        style="background-image: url({{ asset('customer') }}/img/lapangan-dalem1.jpg)">
                    </div>
                    <div class="carousel-item"
                        style="background-image: url({{ asset('customer') }}/img/lapangan-dalem2.jpg)">
                    </div>
                    <div class="carousel-item"
                        style="background-image: url({{ asset('customer') }}/img/lapangan-dalem3.jpg)">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <section class="py-5">
                <div class="container">
                    <h1 class="fw-light">Arena Futsal 77</h1>
                    <p class="lead">Kami selalu berusaha untuk memberikan pelayanan yang terbaik kepada pelanggan kami. Kami selalu mengutamakan kebersihan dan kenyamanan lapangan futsal kami.
                    </p>
                    <p class="lead">Kami mengundang Anda untuk bermain futsal bersama kami di Futsal 77. Kami yakin Anda akan puas dengan pelayanan kami.
                    </p>
                    <p class="lead">Terima kasih.</p>
                </div>
            </section>


            <h1>Jadwal Pertandingan</h1>
            {{-- @if(isset($fixtures['data']) && count($fixtures['data']) > 0)
                <ul>
                    @foreach ($fixtures['data'] as $fixture)
                        <li>{{ $fixture['home_team'] }} vs {{ $fixture['away_team'] }} - {{ $fixture['scheduled'] }}</li>
                    @endforeach
                </ul>
            @else
                @if(isset($fixtures['message']))
                    <p>{{ $fixtures['message'] }}</p>
                @else
                    <p>Tidak ada jadwal pertandingan tersedia.</p>
                @endif
            @endif --}}

            <!-- LIVESCORE WIDGET SOCCERSAPI.COM -->
            <div id="ls-widget" data-w="awo_w4052_65ba4597cd139" class="livescore-widget"></div>
            <script type="text/javascript" src="https://ls.soccersapi.com/widget/res/awo_w4052_65ba4597cd139/widget.js"></script>
            <!-- LIVESCORE WIDGET SOCCERSAPI.COM -->
            <!-- LIVESCORE WIDGET SOCCERSAPI.COM -->
            {{-- <div id="ls-widget" data-w="w_default" class="livescore-widget"></div>
            <script type="text/javascript" src="https://ls.soccersapi.com/widget/res/w_default/widget.js"></script> --}}
            <!-- LIVESCORE WIDGET SOCCERSAPI.COM -->
        </div>

    </section><!-- End Contact Section -->

</main>
<!-- End #main -->
@endsection
