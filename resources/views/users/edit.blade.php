<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded p-6">

                <form action="{{ route('users.update', $user->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Nama</label>

                        <input type="text"
                               name="name"
                               value="{{ $user->name }}"
                               class="w-full border rounded p-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label>Email</label>

                        <input type="email"
                               name="email"
                               value="{{ $user->email }}"
                               class="w-full border rounded p-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label>Password Baru</label>

                        <input type="password"
                               name="password"
                               class="w-full border rounded p-2">

                        <small class="text-gray-500">
                            Kosongkan jika tidak ingin mengubah password
                        </small>
                    </div>

                    <button type="submit"
                            class="text-white px-4 py-2 rounded"
                            style="background-color:#8B6F47;">
                        Update
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
