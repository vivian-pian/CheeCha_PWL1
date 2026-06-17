<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Product
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="px-6">

            <a href="{{ route('products.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded">
                Tambah Product
            </a>

            <div class="mt-4 bg-white shadow rounded p-4">

                <table class="min-w-full border">

                    <thead>
                        <tr class="bg-gray-100">

                            <th class="border px-4 py-2">No</th>

                            <th class="border px-4 py-2">
                                Nama Product
                            </th>

                            <th class="border px-4 py-2">
                                Harga
                            </th>

                            <th class="border px-4 py-2">
                                Status
                            </th>

                            <th class="border px-4 py-2">
                                Penanggung Jawab
                            </th>

                            <th class="border px-4 py-2">
                                Aksi
                            </th>

                        </tr>
                    </thead>

                    <tbody>

                        @forelse($products as $product)

                        <tr>

                            <td class="border px-4 py-2">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $product->product_name }}
                            </td>

                            <td class="border px-4 py-2">
                                Rp {{ number_format($product->price,0,',','.') }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $product->status }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $product->user->name }}
                            </td>

                            <td class="border px-4 py-2">

                                <a href="{{ route('products.edit',$product->id) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('products.destroy',$product->id) }}"
                                      method="POST"
                                      style="display:inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded"
                                            onclick="return confirm('Yakin hapus data?')">
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center py-4">

                                Belum ada data product

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>
