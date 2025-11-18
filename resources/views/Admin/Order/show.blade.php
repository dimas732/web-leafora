@extends('layout')

@section('content')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Invoice
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                            <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                            </svg>
                            Print Invoice
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card card-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="h3">LEAFORA</p>
                                <address>
                                    Jl. Ketintang, Ketintang<br>
                                    Kec. Gayungan, Surabaya<br>
                                    Jawa Timur, 60231<br>
                                    leafora@gmail.com
                                </address>
                            </div>
                            <div class="col-6 text-end">
                                <p class="h3">{{ $orders->cust_name }}</p>
                                <address>
                                    No. Telpon:<br>
                                    {{ $orders->cust_phone }}
                                </address>
                            </div>
                            <div class="col-12 my-5">
                                <h1>{{ $orders->order_code }}</h1>
                            </div>
                        </div>
                        <table class="table table-transparent table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 1%"></th>
                                    <th>Product</th>
                                    <th class="text-center" style="width: 1%">Qnt</th>
                                    <th class="text-end" style="width: 1%">Unit</th>
                                    <th class="text-end" style="width: 1%">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders->details as $index => $detail)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>

                                        <td>
                                            <p class="strong mb-1">{{ $detail->product->name }}</p>
                                            <div class="text-muted">Harga Satuan: Rp
                                                {{ number_format($detail->price, 0, ',', '.') }}</div>
                                        </td>

                                        <td class="text-center">{{ $detail->qty }}</td>

                                        <td class="text-end">Rp {{ number_format($detail->price, 0, ',', '.') }}</td>

                                        <td class="text-end">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="4" class="strong text-end">Subtotal</td>
                                    <td class="text-end">Rp {{ number_format($orders->total_price, 0, ',', '.') }}</td>
                                </tr>

                                <tr>
                                    <td colspan="4" class="font-weight-bold text-uppercase text-end">Total Due</td>
                                    <td class="font-weight-bold text-end">Rp
                                        {{ number_format($orders->total_price, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look
                            forward to working with
                            you again!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
