@extends('layouts.customer.index')

@section('content')
<main id="main">
    <section id="payment" class="mt-lg-5">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h1>Payment</h1>
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
                                        <button type="button" class="btn btn-danger delete-item-btn"
                                            data-item-id="{{ $item->id }}">
                                            Hapus
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
                                                    {{ $item->start_time.' - '.$item->end_time }}
                                                </span>
                                            </div>
                                            <div class="col-lg-6 text-end">
                                                <span class="slot-price">
                                                    {{ __('Rp.').number_format($item->price,2,',','.') }}
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

{{-- @extends('layouts.customer.index')

@section('content')
<form action="" method="POST">
    @csrf
    <main id="main">
        <section id="payment" class="mt-lg-5">
            <div class="container mt-5">
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <h1>Payment</h1>
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
    <a href="" style="color: #A0A4A8;" field-id="474" slot-group-id="tgfwyw5nyw4grnv0c2fside"
        class="slot-delete delete-slot-item" onclick="document.getElementById('delete-{{ $item->id }}').submit();">
        [Hapus]
    </a>
    <form id="delete-{{ $item->id }}" action="{{ route('delete_cart') }}" method="POST" class="d-none">
        @method('delete')
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
    </form>
</div>
<div class="order-slot-time" id="">
    <div class="row ml-2">
        <div class="col-lg-6">
            <span class="slot-time">
                {{ $item->start_time.' - '.$item->end_time }}
            </span>
        </div>
        <div class="col-lg-6 text-end">
            <span class="slot-price">
                {{ __('Rp.').number_format($item->price,2,',','.') }}
            </span>
        </div>
    </div>
</div>
</div>
<Hr>
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
                        <g id="SVGRepo_bgCarrier" stroke-width="0"
                            transform="translate(5.100000000000001,5.100000000000001), scale(0.83)">
                            <rect x="-6" y="-6" width="72.00" height="72.00" rx="36" fill="#a8e9ff" strokewidth="0">
                            </rect>
                        </g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC"
                            stroke-width="0.36"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <path
                                    d="M45.563,29.174l-22-15c-0.307-0.208-0.703-0.231-1.031-0.058C22.205,14.289,22,14.629,22,15v30 c0,0.371,0.205,0.711,0.533,0.884C22.679,45.962,22.84,46,23,46c0.197,0,0.394-0.059,0.563-0.174l22-15 C45.836,30.64,46,30.331,46,30S45.836,29.36,45.563,29.174z M24,43.107V16.893L43.225,30L24,43.107z">
                                </path>
                                <path
                                    d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,58C14.561,58,2,45.439,2,30 S14.561,2,30,2s28,12.561,28,28S45.439,58,30,58z">
                                </path>
                            </g>
                        </g>
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
                            <p>Rp70.000</p>
                        </div>
                        <div class="col-lg-6">
                            <p>Biaya Layanan</p>
                        </div>
                        <div class="col-lg-6 text-end">
                            <p>Rp5.000</p>
                        </div>
                        <hr>
                        <div class="col-lg-6 ">
                            <p class="fw-bold">Total Biaya</p>
                        </div>
                        <div class="col-lg-6 text-end">
                            <p class="fw-bold">Rp75.000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
</main><!-- End #main -->
</form>
@endsection --}}
