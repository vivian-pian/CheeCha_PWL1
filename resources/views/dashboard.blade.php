<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: #97a97c;">
            {{ __('Cheeccha Dessert Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6 text-center">
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-pink-400">
                    <p class="text-gray-500 text-sm uppercase font-bold">Total Products</p>
                    <h3 class="text-3xl font-bold">{{ $totalProducts }}</h3>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-blue-400">
                    <p class="text-gray-500 text-sm uppercase font-bold">Total Customers</p>
                    <h3 class="text-3xl font-bold">{{ $totalCustomers }}</h3>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-green-400">
                    <p class="text-gray-500 text-sm uppercase font-bold">Total Orders</p>
                    <h3 class="text-3xl font-bold">{{ $totalOrders }}</h3>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Product List</h3>
                    <button onclick="document.getElementById('addModal').classList.remove('hidden')" class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-800 transition">
                        + Add Product
                    </button>
                </div>

                <table class="w-full text-left border-collapse">
                    <thead>
    <tr class="bg-gray-50 border-b">
        <th class="p-3 text-left">No</th>
        <th class="p-3 text-left">Name</th>
        <th class="p-3 text-left">Price</th>
        <th class="p-3 text-left">Stock</th>
        <th class="p-3 text-left">Status</th>
        <th class="p-3 text-left">Actions</th> </tr>
</thead>
                    <tbody>
    @foreach ($products as $item)
        <tr class="border-b">
            <td class="p-3">{{ $loop->iteration }}</td>
            
            <td class="p-3">{{ $item->nama_barang }}</td>
            <td class="p-3">{{ $item->price }}</td>
            <td class="p-3">{{ $item->stock }}</td>
            <td class="p-3">{{ $item->status }}</td>
            
            <td class="p-3">
    <div class="flex gap-2">
        <button onclick="document.getElementById('editModal{{ $item->id }}').classList.remove('hidden')" class="text-blue-500 hover:underline">
            Edit
        </button>

        <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
        </form>
    </div>

    <div id="editModal{{ $item->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white p-8 rounded-lg w-96 shadow-xl text-left">
            <h2 class="text-xl font-bold mb-4">Edit Dessert</h2>
            
            <form action="{{ route('inventory.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="space-y-3 text-black">
                    <div>
                        <label class="text-xs font-bold uppercase text-gray-500">Nama Produk</label>
                        <input type="text" name="nama_barang" value="{{ $item->nama_barang }}" class="w-full border rounded p-2" required>
                    </div>
                    <div>
                        <label class="text-xs font-bold uppercase text-gray-500">Harga</label>
                        <input type="number" name="price" value="{{ $item->price }}" class="w-full border rounded p-2" required>
                    </div>
                    <div>
                        <label class="text-xs font-bold uppercase text-gray-500">Stock</label>
                        <input type="number" name="stock" value="{{ $item->stock }}" class="w-full border rounded p-2" required>
                    </div>
                    <div>
                        <label class="text-xs font-bold uppercase text-gray-500">Status</label>
                        <select name="status" class="w-full border rounded p-2">
                            <option value="Ready" {{ $item->status == 'Ready' ? 'selected' : '' }}>Ready</option>
                            <option value="Preorder" {{ $item->status == 'Preorder' ? 'selected' : '' }}>Preorder</option>
                        </select>
                    </div>
                </div>

                <div class="mt-6 flex gap-2">
                    <button type="button" onclick="document.getElementById('editModal{{ $item->id }}').classList.add('hidden')" class="flex-1 bg-gray-200 py-2 rounded text-black">Batal</button>
                    <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded shadow-lg hover:bg-blue-700">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</td>
        </tr>
    @endforeach
</tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg w-96 shadow-xl">
            <h2 class="text-xl font-bold mb-4">New Dessert</h2>
            <form action="{{ route('inventory.store') }}" method="POST">
                @csrf
                <div class="space-y-3">
                    <input type="text" name="nama_barang" placeholder="Product Name" class="w-full border rounded p-2" required>
                    <input type="number" name="price" placeholder="Price" class="w-full border rounded p-2" required>
                    <input type="number" name="stock" placeholder="Stock" class="w-full border rounded p-2" required>
                    <select name="status" class="w-full border rounded p-2">
                        <option value="Ready">Ready</option>
                        <option value="Preorder">Preorder</option>
                    </select>
                </div>
                <div class="mt-6 flex gap-2">
                    <button type="button" onclick="document.getElementById('addModal').classList.add('hidden')" class="flex-1 bg-gray-200 py-2 rounded">Cancel</button>
                    <button type="submit" class="flex-1 bg-black text-white py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>