<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah User
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded p-6">

                <form action="{{ route('users.store') }}"
                      method="POST">

                    @csrf

                    <div class="mb-4">
                        <label>Nama</label>

                        <input type="text"
                               name="name"
                               class="w-full border rounded p-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label>Email</label>

                        <input type="email"
                               name="email"
                               class="w-full border rounded p-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label>Password</label>

                        <input type="password"
                               name="password"
                               class="w-full border rounded p-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label>Konfirmasi Password</label>

                        <input type="password"
                               name="password_confirmation"
                               class="w-full border rounded p-2"
                               required>
                    </div>

                    <button type="submit"
                            class="text-white px-4 py-2 rounded"
                            style="background-color:#97A97C;">
                        Simpan
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>

