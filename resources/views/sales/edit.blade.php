<x-app-layout>

    <div class="bg-[#F5F1EB] min-h-screen py-8">

        <div class="max-w-3xl mx-auto px-6">

            <!-- Hero -->
            <div class="bg-gradient-to-r from-[#6B3D1E] to-[#8B5E3C] rounded-3xl shadow-xl p-8 text-white mb-8">

                <h1 class="text-4xl font-bold">
                    Edit Sales 💳
                </h1>

                <p class="mt-2 opacity-90">
                    Update sales transaction details below.
                </p>

            </div>

            <!-- Form -->
            <div class="bg-white rounded-3xl shadow-xl border border-[#E8D6B3] p-8">

                <form action="{{ route('sales.update', $sale->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <!-- Customer -->
                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Customer Name
                        </label>

                        <input type="text" name="customer_name" value="{{ $sale->customer_name }}" required
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                    </div>

                    <!-- Product -->
                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Product
                        </label>

                        <select name="product_id"
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                            @foreach($products as $product)

                                <option value="{{ $product->id }}" {{ $sale->product_id == $product->id ? 'selected' : '' }}>

                                    {{ $product->product_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Quantity -->
                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Quantity
                        </label>

                        <input type="number" name="quantity" min="1" value="{{ $sale->quantity }}" required
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                    </div>

                    <!-- Person In Charge -->
                    <div class="mb-8">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Person In Charge
                        </label>

                        <input type="text" value="{{ $sale->user->name ?? '-' }}" readonly
                            class="w-full rounded-xl bg-[#F8F5F0] border border-[#D9C7A6] px-4 py-3 text-gray-600">

                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-3">

                        <a href="{{ route('sales.index') }}"
                            class="px-6 py-3 rounded-xl border border-[#8B6F47] text-[#8B6F47] hover:bg-[#F5F1EB] transition">

                            Cancel

                        </a>

                        <button type="submit"
                            class="bg-[#6B3D1E] hover:bg-[#4A2A16] text-white px-6 py-3 rounded-xl shadow-md transition">

                            💾 Update Sales

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>