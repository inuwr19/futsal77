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
            <div id="carouselExampleCaptions" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active"
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
            {{-- <div class="row ml-5">
                    <div class="col-7 col-lg-7">
                        <img src="{{ asset('customer') }}/img/lapangan-dalem1.jpg" alt="" style="width: 100%; height:
            70%; object-fit: cover;">
        </div>
        <div class="col-5 col-lg-5 col-md-3 col-sm-3 col-xs-2">
            <div class="short-div mb-3" style="background-color:red;">Foto 2</div>
            <div class="short-div" style="background-color:purple;">Foto 3</div>
        </div>
        </div> --}}
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
                            <div class="col-lg-4"><img src="{{ asset('customer') }}/hamburger.png" alt=""><span
                                    class="tab" style="color: #25282B;">&emsp;Jual Makanan</span></div>
                            <div class="col-lg-4"><img src="{{ asset('customer') }}/toilet.png" alt=""><span class="tab"
                                    style="color: #25282B;">&emsp;Toilet</span></div>
                            <div class="col-lg-4 mt-3"><img src="{{ asset('customer') }}/parking.png" alt=""><span
                                    class="tab" style="color: #25282B;">&emsp;Tempat Parkir</span></div>
                            <div class="col-lg-4 mt-3"><img src="{{ asset('customer') }}/mosque.png" alt=""><span
                                    class="tab" style="color: #25282B;">&emsp;Mushola</span></div>
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
                                        <input
                                            type="date"
                                            name="date"
                                            id="bookingDate"
                                            class="rounded py-2 px-4 border border-gray-300"
                                            min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                            max="{{ \Carbon\Carbon::now()->addDays(30)->format('Y-m-d') }}" required>
                                    </fieldset>
                                    <hr>

                                    <script>
                                        function change(value) {
                                            document.getElementById("time_id").value = value;
                                        }
                                    </script>

                                    <div class="row" id="hoursContainer">
                                        @foreach ($hours as $item)
                                            <div class="col-md-3 mb-4">
                                                @if (in_array($item->id, $bookedHours))
                                                    <button class="btn btn-outline-secondary" disabled>
                                                        {!! $item->start_time.' - '.$item->end_time.'&#x00A;'.__('Rp.').number_format($item->price, 2, ',', '.') !!}
                                                        (Booked)
                                                    </button>
                                                @else
                                                    <input type="button" class="btn btn-outline-primary"
                                                        value="{!! $item->start_time.' - '.$item->end_time.'&#x00A;'.__('Rp.').number_format($item->price, 2, ',', '.') !!}"
                                                        onclick="change({{ $item->id }});">
                                                @endif
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

@section('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Function to update booked hours based on the selected date
        function updateBookedHours(selectedDate) {
            $.ajax({
                url: '{{ route("getBookedHours") }}',
                type: 'GET',
                data: { date: selectedDate },
                success: function (data) {
                    // Update the hidden input with the selected date
                    $('#selectedDate').val(selectedDate);

                    // Dynamically populate the hoursContainer
                    var hoursContainer = $('#hoursContainer');
                    hoursContainer.empty();
                    @foreach ($hours as $item)
                        var buttonClass = $.inArray({{ $item->id }}, data.bookedHours) !== -1 ? 'btn-outline-secondary' : 'btn-outline-primary';
                        var button = '<div class="col-md-3 mb-4"><input type="button" class="btn ' + buttonClass + '" value="{!! $item->start_time.' - '.$item->end_time.'&#x00A;'.__('Rp.').number_format($item->price, 2, ',', '.') !!}" onclick="change({{ $item->id }})"></div>';
                        hoursContainer.append(button);
                    @endforeach
                }
            });
        }

        // Initial load with the default date
        updateBookedHours($('#bookingDate').val());

        // Handle change event for the date input
        $('#bookingDate').on('change', function () {
            var selectedDate = $(this).val();
            updateBookedHours(selectedDate);
        });
    });
</script>
@endsection
