<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: #97a97c;">
            {{ __('Cheeccha Dessert Management') }}
        </h2>
    </x-slot>

    @extends('layouts.app')

    @section('content')

        <div class="container">

            <h2 class="mb-4">
                Dashboard Inventory
            </h2>

            <div class="row">

                <div class="col-md-3 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h6>Total Produk</h6>
                            <h2>{{ $totalProducts }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h6>Produk Available</h6>
                            <h2>{{ $availableProducts }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h6>Produk Sold Out</h6>
                            <h2>{{ $soldOutProducts }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h6>Total Sales</h6>
                            <h2>{{ $totalSales }}</h2>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-2">

                <div class="col-md-12">
                    <div class="card shadow">

                        <div class="card-body">

                            <h5>Total Revenue</h5>

                            <h1>
                                Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                            </h1>

                        </div>

                    </div>
                </div>

            </div>

            <div class="card shadow mt-4">

                <div class="card-header">
                    Transaksi Terbaru
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Cashier</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($latestSales as $sale)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        {{ $sale->customer_name }}
                                    </td>

                                    <td>
                                        {{ $sale->product->product_name }}
                                    </td>

                                    <td>
                                        {{ $sale->quantity }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($sale->total, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        {{ $sale->user->name }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="text-center">
                                        Belum ada transaksi
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    @endsection
</x-app-layout>