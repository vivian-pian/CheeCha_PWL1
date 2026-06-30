<x-app-layout>

    <div class="bg-[#F5F1EB] min-h-screen py-8">

        <div class="max-w-3xl mx-auto px-6">

            <div class="bg-gradient-to-r from-[#6B3D1E] to-[#8B5E3C] rounded-3xl shadow-xl p-8 text-white mb-8">

                <h1 class="text-4xl font-bold">
                    Edit Product 
                </h1>

                <p class="mt-2 opacity-90">
                    Update your product details below.
                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-xl border border-[#E8D6B3] p-8">

                <form action="{{ route('products.update', $product->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Product Name
                        </label>

                        <input type="text" name="product_name" value="{{ $product->product_name }}" required
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                    </div>

                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Price (Rp)
                        </label>

                        <input type="number" name="price" value="{{ $product->price }}" required
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                    </div>

                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Product Status
                        </label>

                        <select name="status"
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                            <option value="ready" {{ $product->status == 'ready' ? 'selected' : '' }}>
                                Ready
                            </option>

                            <option value="pre-order" {{ $product->status == 'pre-order' ? 'selected' : '' }}>
                                Pre Order
                            </option>

                        </select>

                    </div>

                    <div class="mb-8">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Person In Charge
                        </label>

                        <input type="text" value="{{ $product->user->name }}" readonly
                            class="w-full rounded-xl bg-[#F8F5F0] border border-[#D9C7A6] px-4 py-3 text-gray-600">

                    </div>

                    <div class="flex justify-end gap-3">

                        <a href="{{ route('products.index') }}"
                            class="px-6 py-3 rounded-xl border border-[#8B6F47] text-[#8B6F47] hover:bg-[#F5F1EB] transition">

                            Cancel

                        </a>

                        <button type="submit"
                            class="bg-[#6B3D1E] hover:bg-[#4A2A16] text-white px-6 py-3 rounded-xl shadow-md transition">

                            Update Product

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>