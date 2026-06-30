<x-app-layout>

    <div class="bg-[#F5F1EB] min-h-screen py-8">

        <div class="max-w-3xl mx-auto px-6">

            <div class="bg-gradient-to-r from-[#6B3D1E] to-[#8B5E3C] rounded-3xl shadow-xl p-8 text-white mb-8">

                <h1 class="text-4xl font-bold">
                    Add Product 
                </h1>

                <p class="mt-2 opacity-90">
                    Add a new product to your menu.
                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-xl border border-[#E8D6B3] p-8">

                <form action="{{ route('products.store') }}" method="POST">

                    @csrf

                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Product Name
                        </label>

                        <input type="text" name="product_name" required placeholder="Example: Cheesecake Matcha"
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                    </div>

                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Price (Rp)
                        </label>

                        <input type="number" name="price" required placeholder="30000"
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                    </div>

                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Product Status
                        </label>

                        <select name="status"
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                            <option value="ready">
                                Ready
                            </option>

                            <option value="pre-order">
                                Pre Order
                            </option>

                        </select>

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

                        <a href="{{ route('products.index') }}"
                            class="px-6 py-3 rounded-xl border border-[#8B6F47] text-[#8B6F47] hover:bg-[#F5F1EB] transition">

                            Cancel

                        </a>

                        <button type="submit"
                            class="bg-[#6B3D1E] hover:bg-[#4A2A16] text-white px-6 py-3 rounded-xl shadow-md transition">

                            Save Product

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>