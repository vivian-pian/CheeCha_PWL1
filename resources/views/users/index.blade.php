<x-app-layout>


    <div class="bg-[#F5F1EB] min-h-screen py-8">

        <div class="max-w-7xl mx-auto px-6">

            <div class="bg-gradient-to-r from-[#6B3D1E] to-[#8B5E3C] rounded-3xl shadow-xl p-8 text-white mb-8">

                <div class="flex justify-between items-center">

                    <div>

                        <h1 class="text-4xl font-bold">
                            User Management
                        </h1>

                        <p class="mt-2 opacity-90">
                            Manage users accounts for L'Avenir Boulangerie.
                        </p>

                    </div>

                    <a href="{{ route('users.create') }}"
                        class="bg-white text-[#6B3D1E] font-semibold px-6 py-3 rounded-xl hover:bg-[#F5F1EB] transition">

                        + Add User

                    </a>

                </div>

            </div>

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-[#E8D6B3]">

                <div class="bg-[#E8D6B3] px-6 py-5">

                    <h3 class="text-2xl font-bold text-[#4A2A16]">
                        Registered Users
                    </h3>

                    <p class="text-[#6B3D1E] text-sm">
                        List of user accounts.
                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead>

                            <tr class="bg-[#F5F1EB] text-[#4A2A16]">

                                <th class="px-6 py-4 text-left">No</th>
                                <th class="px-6 py-4 text-left">Name</th>
                                <th class="px-6 py-4 text-left">Email</th>
                                <th class="px-6 py-4 text-left">Role</th>
                                <th class="px-6 py-4 text-left">Created At</th>
                                <th class="px-6 py-4 text-center">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($users as $user)

                                <tr class="border-b hover:bg-[#FFF8EF] transition">

                                    <td class="px-6 py-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-6 py-4 font-medium">
                                        {{ $user->name }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $user->email }}
                                    </td>

                                    <td class="px-6 py-4">

                                        @if($user->role == 'admin')

                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">
                                                Admin
                                            </span>

                                        @else

                                            <span
                                                class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                                                User
                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $user->created_at->format('d M Y') }}
                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="flex justify-center gap-2">

                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="bg-[#E8D6B3] hover:bg-[#D8C19B] text-[#4A2A16] font-semibold px-4 py-2 rounded-xl transition">

                                                Edit

                                            </a>

                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button onclick="return confirm('Yakin ingin menghapus user ini?')"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl transition">

                                                    Delete

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="text-center py-16">


                                        <h2 class="text-xl font-semibold text-gray-500">
                                            No users found
                                        </h2>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>