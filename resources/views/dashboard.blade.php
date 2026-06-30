<x-app-layout>

    @if(session('error'))

        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">

            {{ session('error') }}

        </div>

    @endif

    <div class="py-8 bg-[#F5F1EB] min-h-screen">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div
                    class="bg-white rounded-3xl shadow-lg p-6 border border-[#E8D6B3] hover:shadow-xl transition duration-300">

                    <h6 class="text-gray-500">
                        Total Products
                    </h6>

                    <h2 class="text-4xl font-bold text-[#4A2A16] mt-2">
                        {{ $totalProducts }}
                    </h2>

                </div>

                <div
                    class="bg-white rounded-3xl shadow-lg p-6 border border-[#E8D6B3] hover:shadow-xl transition duration-300">

                    <h6 class="text-gray-500">
                        Pre-Order Products
                    </h6>

                    <h2 class="text-4xl font-bold text-[#4A2A16] mt-2">
                        {{ $POProducts }}
                    </h2>

                </div>

                <div
                    class="bg-white rounded-3xl shadow-lg p-6 border border-[#E8D6B3] hover:shadow-xl transition duration-300">

                    <h6 class="text-gray-500">
                        Ready Products
                    </h6>

                    <h2 class="text-4xl font-bold text-[#4A2A16] mt-2">
                        {{ $availableProducts }}
                    </h2>

                </div>

                <div
                    class="bg-white rounded-3xl shadow-lg p-6 border border-[#E8D6B3] hover:shadow-xl transition duration-300">

                    <h6 class="text-gray-500">
                        Total Sales
                    </h6>

                    <h2 class="text-4xl font-bold text-[#4A2A16] mt-2">
                        {{ $totalSales }}
                    </h2>

                </div>

            </div>

            <div class="bg-gradient-to-r from-[#6B3D1E] to-[#8B5E3C] rounded-3xl shadow-xl p-8 mt-8 text-white">

                <p class="uppercase tracking-widest text-sm opacity-80">
                    Pendapatan
                </p>

                <h2 class="text-5xl font-bold mt-3">
                    Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                </h2>

                <p class="mt-3 opacity-80">
                    Total pendapatan dari seluruh transaksi.
                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-xl mt-8 overflow-hidden">

                <div class="bg-[#E8D6B3] px-6 py-5">

                    <h3 class="text-2xl font-bold text-[#4A2A16]">
                        Transaksi Terakhir
                    </h3>

                    <p class="text-[#6B3D1E] text-sm">
                        History Transaksi Penjualan Terakhir.
                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead>

                            <tr class="bg-[#F5F1EB] text-[#4A2A16]">

                                <th class="px-6 py-4 text-left font-semibold">
                                    No
                                </th>

                                <th class="px-6 py-4 text-left font-semibold">
                                    Nama Customer
                                </th>

                                <th class="px-6 py-4 text-left font-semibold">
                                    Nama Produk
                                </th>

                                <th class="px-6 py-4 text-center font-semibold">
                                    Quantity
                                </th>

                                <th class="px-6 py-4 text-left font-semibold">
                                    Total
                                </th>

                                <th class="px-6 py-4 text-left font-semibold">
                                    Cashier
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($latestSales as $sale)

                                <tr class="border-b hover:bg-[#FFF8EF] transition">

                                    <td class="px-6 py-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-6 py-4 font-medium">
                                        {{ $sale->customer_name }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $sale->product->product_name }}
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        {{ $sale->quantity }}
                                    </td>

                                    <td class="px-6 py-4 font-semibold text-[#6B3D1E]">
                                        Rp {{ number_format($sale->total, 0, ',', '.') }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $sale->user->name }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center py-12 text-gray-500">

                                        Belum ada transaksi.

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