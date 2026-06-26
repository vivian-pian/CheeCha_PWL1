<x-app-layout>

    <div class="bg-[#F5F1EB] min-h-screen py-8">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Hero -->
            <div class="bg-gradient-to-r from-[#6B3D1E] to-[#8B5E3C] rounded-3xl shadow-xl p-8 text-white mb-8">

                <div class="flex justify-between items-center">

                    <div>

                        <h1 class="text-4xl font-bold">
                            Product Management 🍰
                        </h1>

                        <p class="mt-2 opacity-90">
                            Manage your cheesecake menu and product availability.
                        </p>

                    </div>

                    <a href="{{ route('products.create') }}"
                        class="bg-white text-[#6B3D1E] font-semibold px-6 py-3 rounded-xl hover:bg-[#F5F1EB] transition">

                        + Add Product

                    </a>

                </div>

            </div>

            <!-- Table -->

            <div class="bg-white rounded-3xl shadow-xl border border-[#E8D6B3] overflow-hidden">

                <div class="bg-[#E8D6B3] px-6 py-5">

                    <h3 class="text-2xl font-bold text-[#4A2A16]">
                        Product List
                    </h3>

                    <p class="text-[#6B3D1E] text-sm">
                        Complete list of available products.
                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead>

                            <tr class="bg-[#F5F1EB] text-[#4A2A16]">

                                <th class="px-6 py-4 text-left">No</th>
                                <th class="px-6 py-4 text-left">Product Name</th>
                                <th class="px-6 py-4 text-left">Price</th>
                                <th class="px-6 py-4 text-center">Status</th>
                                <th class="px-6 py-4 text-left">Person In Charge</th>
                                <th class="px-6 py-4 text-center">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($products as $product)

                                <tr class="border-b hover:bg-[#FFF8EF] transition">

                                    <td class="px-6 py-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-6 py-4 font-semibold text-[#4A2A16]">
                                        {{ $product->product_name }}
                                    </td>

                                    <td class="px-6 py-4">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        @if($product->status == 'ready')

                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                                ✅ Ready
                                            </span>

                                        @else

                                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                                                ⏳ Pre Order
                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $product->user->name }}
                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="flex justify-center gap-2">

                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="bg-[#E8D6B3] hover:bg-[#D9C7A6] text-[#4A2A16] font-semibold px-4 py-2 rounded-xl transition">

                                                ✏ Edit

                                            </a>

                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl transition">

                                                    🗑 Delete

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center py-16">

                                        <div class="text-6xl mb-4">
                                            🍰
                                        </div>

                                        <h2 class="text-xl font-semibold text-gray-500">
                                            No products available.
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