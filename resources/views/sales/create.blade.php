<x-app-layout>

    <div class="bg-[#F5F1EB] min-h-screen py-8">

        <div class="max-w-3xl mx-auto px-6">

            <div class="bg-gradient-to-r from-[#6B3D1E] to-[#8B5E3C] rounded-3xl shadow-xl p-8 text-white mb-8">

                <h1 class="text-4xl font-bold">
                    Add Sales 
                </h1>

                <p class="mt-2 opacity-90">
                    Fill in the sale transaction details below.
                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-xl border border-[#E8D6B3] p-8">

                <form action="{{ route('sales.store') }}" method="POST">

                    @csrf

                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Customer Name
                        </label>

                        <input type="text" name="customer_name" required placeholder="Enter customer name"
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                    </div>

                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Product
                        </label>

                        <select name="product_id"
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                            @foreach($products as $product)

                                <option value="{{ $product->id }}">
                                    {{ $product->product_name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Quantity
                        </label>

                        <input type="number" name="quantity" min="1" required placeholder="Enter quantity"
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                    </div>

                    <div class="mb-8">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Person In Charge
                        </label>

                        <input type="text" value="{{ Auth::user()->name }}" readonly
                            class="w-full rounded-xl bg-[#F8F5F0] border border-[#D9C7A6] px-4 py-3 text-gray-600">

                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                    </div>

                    <div class="flex justify-end gap-3">

                        <a href="{{ route('sales.index') }}"
                            class="px-6 py-3 rounded-xl border border-[#8B6F47] text-[#8B6F47] hover:bg-[#F5F1EB] transition">

                            Cancel

                        </a>

                        <button type="submit"
                            class="bg-[#6B3D1E] hover:bg-[#4A2A16] text-white px-6 py-3 rounded-xl shadow-md transition">

                            Save Sales

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>