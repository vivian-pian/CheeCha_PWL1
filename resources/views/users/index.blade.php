<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Users
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="px-6">
    <div class="flex justify-end mb-4">
            <a href="{{ route('users.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded">
                Tambah User
            </a>
    </div>
            <div class="bg-white shadow rounded p-4 mt-4">

                <table class="min-w-full border">

                    <thead>
                        <tr class="bg-gray-100">

                            <th class="border px-4 py-2">
                                No
                            </th>

                            <th class="border px-4 py-2">
                                Nama
                            </th>

                            <th class="border px-4 py-2">
                                Email
                            </th>

                            <th class="border px-4 py-2">
                                Dibuat Pada
                            </th>

                            <th class="border px-4 py-2">
                                Aksi
                            </th>

                        </tr>
                    </thead>

                    <tbody>

                        @forelse($users as $user)

                        <tr>

                            <td class="border px-4 py-2">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $user->name }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $user->email }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $user->created_at->format('d M Y') }}
                            </td>

                            <td class="border px-4 py-2">

                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('users.destroy', $user->id) }}"
                                      method="POST"
                                      style="display:inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded"
                                            onclick="return confirm('Yakin hapus user?')">
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-4">

                                Belum ada data user

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>
