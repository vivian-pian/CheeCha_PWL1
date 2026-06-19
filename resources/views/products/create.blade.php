<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Product
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="px-6">

            <div class="bg-white shadow rounded p-6">

                <form action="{{ route('products.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label class="block mb-2">
                            Nama Product
                        </label>

                        <input type="text" name="product_name" class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">
                            Harga Jual
                        </label>

                        <input type="number" name="price" class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">
                            Status
                        </label>

                        <select name="status" class="w-full border rounded p-2">

                            <option value="ready">
                                Ready
                            </option>

                            <option value="pre-order">
                                Pre Order
                            </option>

                        </select>
                    </div>

                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                        Simpan
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>