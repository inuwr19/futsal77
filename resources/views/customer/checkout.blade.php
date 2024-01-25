@extends('layouts.customer.index')

@section('content')
<main id="main">
    <section id="payment" class="mt-lg-5">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h1>Checkout</h1>
                    <hr />
                </div>
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="infoPayment">
                                <div class="rental-fee">
                                    <div class="row mx-0 px-0">
                                        <div class="infoPayment">
                                            @forelse ($cart as $item)
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <p>{{ $item->formattedDate }}</p>
                                                </div>
                                                <div class="order-slot-time" id="">
                                                    <div class="row ml-2">
                                                        <div class="col-lg-6">
                                                            <span class="slot-time">
                                                                {{ $item->hour->start_time.' - '.$item->hour->end_time }}
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-6 text-end">
                                                            <span class="slot-price">
                                                                {{ __('Rp.').number_format($item->hour->price,2,',','.') }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            @empty
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h2>Data belum tersedia!</h2>
                                                </div>
                                            </div>
                                            @endforelse
                                        </div>
                                        <div class="col-lg-6">
                                            <p>Biaya Sewa</p>
                                        </div>
                                        <div class="col-lg-6 text-end">
                                            <p>{{ __('Rp.').number_format($total,2,',','.') }}</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>Biaya Layanan</p>
                                        </div>
                                        <div class="col-lg-6 text-end">
                                            <p>{{ __('Rp.').number_format(5000,2,',','.') }}</p>
                                        </div>
                                        <hr>
                                        <div class="col-lg-6">
                                            <p class="fw-bold">Total Biaya</p>
                                        </div>
                                        <div class="col-lg-6 text-end">
                                            <p class="fw-bold">{{ "Rp." .number_format($total+5000, 2, ",", ".") }}</p>
                                        </div>
                                        <input type="hidden" name="total_price" value="{{ $total+5000 }}">
                                        <form class="col-lg-12 text-center" action="{{ route('payment') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="total_price" value="{{ $total+5000 }}">
                                            <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
