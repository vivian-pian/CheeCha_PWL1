<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Sales
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded p-6">

                <form action="{{ route('sales.update', $sale->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Customer Name</label>

                        <input type="text" name="customer_name" value="{{ $sale->customer_name }}"
                            class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label>Product</label>

                        <select name="product_id" class="w-full border rounded p-2">

                            @foreach($products as $product)

                                <option value="{{ $product->id }}" {{ $sale->product_id == $product->id ? 'selected' : '' }}>

                                    {{ $product->product_name }}

                                </option>

                            @endforeach

                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Quantity</label>

                        <input type="number" name="quantity" value="{{ $sale->quantity }}" min="1"
                            class="w-full border rounded p-2" required>
                    </div>

                    <!-- Penanggung Jawab -->
                    <div class="mb-4">

                        <label>Penanggung Jawab</label>

                        <input type="text" value="{{ $sale->user->name ?? '-' }}"
                            class="w-full border rounded p-2 bg-gray-100" readonly>

                    </div>

                    <button type="submit" class="text-white px-4 py-2 rounded" style="background-color:#8B6F47;">
                        Update
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>