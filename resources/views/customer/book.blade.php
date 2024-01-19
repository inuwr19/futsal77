@extends('layouts.customer.index')

@section('content')
    <!-- Banner -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="container text-center text-md-left" data-aos="fade-up">
            <h1><span>Booking</span> Sekarang Juga!</h1>
            <h2>Kini kami hadir untuk mempermudah anda</h2>
        </div>
    </section>
    <!-- End Banner -->

    <!-- Main -->
    <main id="main">
        <section id="booking">
            <div class="container">
                <div class="row ml-5">
                    <div class="col-7 col-lg-7">
                        <img src="{{ asset('customer') }}/img/lapangan-dalem1.jpg" alt="" style="width: 100%; height: 70%; object-fit: cover;">
                    </div>
                    <div class="col-5 col-lg-5 col-md-3 col-sm-3 col-xs-2">
                        <div class="short-div mb-3" style="background-color:red;">Foto 2</div>
                        <div class="short-div" style="background-color:purple;">Foto 3</div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-6 col-lg-6">
                        <h1>Arena Utama
                            <span style="font-size: 18px;">
                                <span style="color: #25282B;">
                                    4.8
                                </span>
                                <i class="bi bi-star-fill" style="color: #FCB145;"></i>
                            </span>
                        </h1>
                        <hr>
                        <div class="infoBooking">
                            <p>Lapangan Futsal (Vinyl)</p><br>
                            <p>Informasi Penting:</p>
                            <p>Tidak dapat melakukan Reschedule tanpa kecuali.</p>
                            <hr>
                            <h5>Fasilitas</h5>
                            <div class="row">
                                <div class="col-lg-4"><img src="{{ asset('customer') }}/soda.png" alt=""><span class="tab"
                                        style="color: #25282B;">&emsp;Jual Minuman</span></div>
                                <div class="col-lg-4"><img src="{{ asset('customer') }}/hamburger.png" alt=""><span class="tab"
                                        style="color: #25282B;">&emsp;Jual Makanan</span></div>
                                <div class="col-lg-4"><img src="{{ asset('customer') }}/toilet.png" alt=""><span class="tab"
                                        style="color: #25282B;">&emsp;Toilet</span></div>
                                <div class="col-lg-4 mt-3"><img src="{{ asset('customer') }}/parking.png" alt=""><span class="tab"
                                        style="color: #25282B;">&emsp;Tempat Parkir</span></div>
                                <div class="col-lg-4 mt-3"><img src="{{ asset('customer') }}/mosque.png" alt=""><span class="tab"
                                        style="color: #25282B;">&emsp;Mushola</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="infoBooking">
                                    <p style="font-size: 16px;">Mulai dari</p>
                                    <h3>Rp 70,000<span style="font-size: 18px; color: rgb(124, 124, 124);"> Per
                                            Sesi</span></h3>
                                    <form method="POST" action="{{ route('addCart') }}">
                                        @csrf
                                        {{-- <input id="datepicker" type="text" class="form-control" > --}}
                                        <fieldset>
                                            <input type="date" class="rounded py-2 px-4 border border-gray-300" name="date"
                                                   min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                                   max="{{ \Carbon\Carbon::now()->addDays(30)->format('Y-m-d') }}" required>
                                        </fieldset>
                                        <hr>

                                        <script>
                                            function change(value) {
                                                document.getElementById("time_id").value = value;
                                            }
                                        </script>

                                        <div class="row">
                                            @foreach ($hours as $item)
                                                <div class="col-md-3 mb-4">
                                                    <input type="button" class="btn btn-outline-primary"
                                                    value="{!! $item->start_time.' - '.$item->end_time.'&#x00A;'.__('Rp.').number_format($item->price,2,',','.') !!}"
                                                    onclick="change({{ $item->id }});">
                                                </div>
                                            @endforeach
                                            <input type="hidden" name="time_id" id="time_id" value="0">
                                            <div class="col-lg-12 mb-4 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary">Book Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->
@endsection
