<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Sales
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="px-6">

            <a href="{{ route('sales.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded">
                Tambah Sales
            </a>

            <div class="bg-white shadow rounded p-4 mt-4">

                <table class="min-w-full border">

                    <thead>
                        <tr class="bg-gray-100">

                            <th class="border px-4 py-2">
                                No
                            </th>

                            <th class="border px-4 py-2">
                                Customer
                            </th>

                            <th class="border px-4 py-2">
                                Product
                            </th>

                            <th class="border px-4 py-2">
                                Harga
                            </th>

                            <th class="border px-4 py-2">
                                Qty
                            </th>

                            <th class="border px-4 py-2">
                                Total
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

                        @forelse($sales as $sale)

                        <tr>

                            <td class="border px-4 py-2">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $sale->customer_name }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $sale->product->product_name }}
                            </td>

                            <td class="border px-4 py-2">
                                Rp {{ number_format($sale->price,0,',','.') }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $sale->quantity }}
                            </td>

                            <td class="border px-4 py-2">
                                Rp {{ number_format($sale->total,0,',','.') }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $sale->user->name }}
                            </td>

                            <td class="border px-4 py-2">

                                <a href="{{ route('sales.edit',$sale->id) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('sales.destroy',$sale->id) }}"
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

                            <td colspan="8"
                                class="text-center py-4">

                                Belum ada data sales

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>

