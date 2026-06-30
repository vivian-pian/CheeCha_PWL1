<x-app-layout>

    <div class="bg-[#F5F1EB] min-h-screen py-8">

        <div class="max-w-7xl mx-auto px-6">

            <div class="bg-gradient-to-r from-[#6B3D1E] to-[#8B5E3C] rounded-3xl shadow-xl p-8 text-white mb-8">

                <div class="flex justify-between items-center">

                    <div>

                        <h1 class="text-4xl font-bold">
                            Sales Management
                        </h1>

                        <p class="mt-2 opacity-90">
                            View, manage and record all sales transactions.
                        </p>

                    </div>

                    <a href="{{ route('sales.create') }}"
                        class="bg-white text-[#6B3D1E] font-semibold px-6 py-3 rounded-xl hover:bg-[#F5F1EB] transition">

                        + Add Sales

                    </a>

                </div>

            </div>

            <div class="bg-white rounded-3xl shadow-xl border border-[#E8D6B3] overflow-hidden">

                <div class="bg-[#E8D6B3] px-6 py-5">

                    <h3 class="text-2xl font-bold text-[#4A2A16]">
                        Sales Transactions
                    </h3>

                    <p class="text-[#6B3D1E] text-sm">
                        Complete history of customer purchases.
                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead>

                            <tr class="bg-[#F5F1EB] text-[#4A2A16]">

                                <th class="px-6 py-4 text-left">No</th>
                                <th class="px-6 py-4 text-left">Customer</th>
                                <th class="px-6 py-4 text-left">Product</th>
                                <th class="px-6 py-4 text-left">Price</th>
                                <th class="px-6 py-4 text-center">Qty</th>
                                <th class="px-6 py-4 text-left">Total</th>
                                <th class="px-6 py-4 text-left">Cashier</th>
                                <th class="px-6 py-4 text-center">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($sales as $sale)

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

                                    <td class="px-6 py-4">
                                        Rp {{ number_format($sale->price, 0, ',', '.') }}
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        {{ $sale->quantity }}
                                    </td>

                                    <td class="px-6 py-4 font-bold text-[#6B3D1E]">
                                        Rp {{ number_format($sale->total, 0, ',', '.') }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $sale->user->name }}
                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="flex justify-center gap-2">

                                            <a href="{{ route('sales.edit', $sale->id) }}"
                                                class="bg-[#E8D6B3] hover:bg-[#D9C7A6] text-[#4A2A16] font-semibold px-4 py-2 rounded-xl transition">

                                                Edit

                                            </a>

                                            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl transition">

                                                    Delete

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8" class="text-center py-16">

                                        <h2 class="text-xl text-gray-500 font-semibold">
                                            No sales data available.
                                        </h2>

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