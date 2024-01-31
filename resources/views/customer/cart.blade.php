@extends('layouts.customer.index')

@section('content')
<main id="main">
    <section id="payment" class="mt-lg-5">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h1>Cart</h1>
                    <hr />
                </div>
                <div class="col-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5>Arena Utama
                                <span style="font-size: 18px;">
                                    <span style="color: #25282B;">
                                        4.8
                                    </span>
                                    <i class="bi bi-star-fill" style="color: #FCB145;"></i>
                                </span>
                            </h5>
                            <hr>
                            <div class="infoPayment">
                                @forelse ($cart as $item)
                                <div class="row mb-5">
                                    <div class="col-lg-6">
                                        <p>{{ $item->date }}</p>
                                    </div>
                                    <div class="col-lg-6 text-end">
                                        <button type="button" class="btn delete-item-btn" style="color: #A0A4A8;"
                                            data-item-id="{{ $item->id }}">
                                            [Hapus]
                                        </button>
                                        <form id="delete-{{ $item->id }}" action="{{ route('delete_cart') }}"
                                            method="POST" class="d-none">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                        </form>
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
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="infoPayment">
                                <p style="font-size: 18px;">
                                    <svg fill="#3279fc" height="16px" width="16px" version="1.1" id="Capa_1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="-6 -6 72.00 72.00" xml:space="preserve" stroke="#3279fc"
                                        stroke-width="0.0006000000000000001">
                                        <!-- ... ikon SVG lainnya ... -->
                                    </svg>
                                    Rincian Biaya
                                </p>
                                <hr>
                                <div class="rental-fee">
                                    <div class="row mx-0 px-0">
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
                                        <form class="col-lg-12 text-center" action="{{ route('checkout') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="total_price" value="{{ $total+5000 }}">
                                            <button type="submit" class="btn btn-primary">Checkout</button>
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