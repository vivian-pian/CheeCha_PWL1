<x-app-layout>

    <div class="bg-[#F5F1EB] min-h-screen py-8">

        <div class="max-w-3xl mx-auto px-6">

            <!-- Header -->
            <div class="bg-gradient-to-r from-[#6B3D1E] to-[#8B5E3C] rounded-3xl shadow-xl p-8 text-white mb-8">

                <h1 class="text-4xl font-bold">
                    Edit User 👤
                </h1>

                <p class="mt-2 opacity-90">
                    Update the user's information below.
                </p>

            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl shadow-xl border border-[#E8D6B3] p-8">

                <form action="{{ route('users.update', $user->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ $user->name }}"
                            required
                            class="w-full rounded-xl border border-[#D9C7A6] focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47] px-4 py-3">

                    </div>

                    <!-- Email -->
                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ $user->email }}"
                            required
                            class="w-full rounded-xl border border-[#D9C7A6] focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47] px-4 py-3">

                    </div>

                    <!-- Password -->
                    <div class="mb-8">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            New Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            placeholder="Leave blank if you don't want to change it"
                            class="w-full rounded-xl border border-[#D9C7A6] focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47] px-4 py-3">

                        <p class="text-sm text-gray-500 mt-2">
                            Leave this field empty if you don't want to change the current password.
                        </p>

                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-3">

                        <a href="{{ route('users.index') }}"
                            class="px-6 py-3 rounded-xl border border-[#8B6F47] text-[#8B6F47] hover:bg-[#F5F1EB] transition">

                            Cancel

                        </a>

                        <button
                            type="submit"
                            class="bg-[#6B3D1E] hover:bg-[#4A2A16] text-white px-6 py-3 rounded-xl shadow-md transition">

                            💾 Update User

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>