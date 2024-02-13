@extends('layouts.admin.index')

@section('content')
        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Penjualan</p>
                            <h6 class="mb-0">{{__('Rp.').number_format($total, 2, ',', '.') }}</h6>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-sm-6 col-xl-6">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Sale</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- Sale & Revenue End -->


        <!-- Sales Chart Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                {{-- <div class="col-sm-12 col-xl-12">
                    <div class="bg-light text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Worldwide Sales</h6>
                            <a href="">Show All</a>
                        </div>
                    </div>
                </div> --}}
                <canvas hidden id="worldwide-sales"></canvas>
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Sales</h6>
                            <a href="">Show All</a>
                        </div>
                        <canvas id="sales"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sales Chart End -->


        <!-- Recent Sales Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Recent Salse</h6>
                    <a href="">Show All</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Date</th>
                                <th scope="col">Hour</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                            <tr>
                                <td>{{ $item->order_product[0]->date }}</td>
                                <td>{{ $item->order_product[0]->hour->start_time.' - '.$item->order_product[0]->hour->end_time}}</td>
                                <td>{{ $item->code_order }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{__('Rp.').number_format($item->total_price, 2, ',', '.') }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Recent Sales End -->
@endsection

@section('js')
    <script>
        var ctx2 = $("#sales").get(0).getContext("2d");
        var myChart2 = new Chart(ctx2, {
            type: "line",
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: "Sales",
                    data: {!! json_encode($monthlySales) !!},
                    backgroundColor: "rgba(0, 156, 255, .5)",
                    fill: true
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
@endsection
