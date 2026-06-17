<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: #97a97c;">
            {{ __('Cheeccha Dessert Management') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2 class="text-2xl font-bold mb-4">
                Dashboard Admin
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                <div class="bg-white shadow rounded p-4">
                    <h6>Total Produk</h6>
                    <h2 class="text-3xl font-bold">
                        {{ $totalProducts }}
                    </h2>
                </div>

                <div class="bg-white shadow rounded p-4">
                    <h6>Produk Available</h6>
                    <h2 class="text-3xl font-bold">
                        {{ $availableProducts }}
                    </h2>
                </div>

                <div class="bg-white shadow rounded p-4">
                    <h6>Produk Sold Out</h6>
                    <h2 class="text-3xl font-bold">
                        {{ $soldOutProducts }}
                    </h2>
                </div>

                <div class="bg-white shadow rounded p-4">
                    <h6>Total Sales</h6>
                    <h2 class="text-3xl font-bold">
                        {{ $totalSales }}
                    </h2>
                </div>

            </div>

            <div class="bg-white shadow rounded p-6 mt-6">
                <h5 class="text-lg font-semibold">
                    Total Revenue
                </h5>

                <h1 class="text-4xl font-bold mt-2">
                    Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                </h1>
            </div>

            <div class="bg-white shadow rounded mt-6">

                <div class="p-4 border-b">
                    <h5 class="font-semibold">
                        Transaksi Terbaru
                    </h5>
                </div>

                <div class="p-4 overflow-x-auto">

                    <table class="min-w-full border">

                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">Customer</th>
                                <th class="border px-4 py-2">Product</th>
                                <th class="border px-4 py-2">Qty</th>
                                <th class="border px-4 py-2">Total</th>
                                <th class="border px-4 py-2">Cashier</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($latestSales as $sale)

                            <tr>
                                <td class="border px-4 py-2">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $sale->customer_name }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $sale->product->product_name }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $sale->quantity }}
                                </td>

                                <td class="border px-4 py-2">
                                    Rp {{ number_format($sale->total,0,',','.') }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $sale->user->name }}
                                </td>
                            </tr>

                            @empty

                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    Belum ada transaksi
                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>

