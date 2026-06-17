```php
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Sales
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded p-6">

                <form action="{{ route('sales.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label>Customer Name</label>

                        <input type="text"
                               name="customer_name"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Product</label>

                        <select name="product_id"
                                class="w-full border rounded p-2">

                            @foreach($products as $product)

                            <option value="{{ $product->id }}">
                                {{ $product->product_name }}
                            </option>

                            @endforeach

                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Quantity</label>

                        <input type="number"
                               name="quantity"
                               class="w-full border rounded p-2">
                    </div>

                    <button type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded">
                        Simpan
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
```
