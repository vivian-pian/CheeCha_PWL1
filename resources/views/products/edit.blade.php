<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Product
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="px-6">

            <div class="bg-white shadow rounded p-6">

                <form action="{{ route('products.update', $product->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">

                        <label class="block mb-2">
                            Nama Product
                        </label>

                        <input type="text"
                               name="product_name"
                               value="{{ $product->product_name }}"
                               class="w-full border rounded p-2">

                    </div>

                    <div class="mb-4">

                        <label class="block mb-2">
                            Harga
                        </label>

                        <input type="number"
                               name="price"
                               value="{{ $product->price }}"
                               class="w-full border rounded p-2">

                    </div>

                    <div class="mb-4">

                        <label class="block mb-2">
                            Status
                        </label>

                        <select name="status"
                                class="w-full border rounded p-2">

                            <option value="ready"
                                {{ $product->status == 'ready' ? 'selected' : '' }}>
                                Ready
                            </option>

                            <option value="pre-order"
                                {{ $product->status == 'pre-order' ? 'selected' : '' }}>
                                Pre Order
                            </option>

                        </select>

                    </div>

                    <!-- Penanggung Jawab -->
                    <div class="mb-4">

                        <label class="block mb-2">
                            Penanggung Jawab
                        </label>

                        <input type="text"
                               value="{{ $product->user->name }}"
                               class="w-full border rounded p-2 bg-gray-100"
                               readonly>

                    </div>

                    <button type="submit"
                            class="bg-[#8B6F47] hover:bg-[#70583a] text-white px-4 py-2 rounded">
                        Update
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>