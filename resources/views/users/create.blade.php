<x-app-layout>

    <div class="bg-[#F5F1EB] min-h-screen py-8">

        <div class="max-w-3xl mx-auto px-6">

            <div class="bg-gradient-to-r from-[#8B6F47] to-[#0000] rounded-3xl shadow-xl p-8 text-white mb-8">

                <h1 class="text-4xl font-bold">
                    Add User
                </h1>

                <p class="mt-2 opacity-90">
                    Fill in the information below to create a new administrator account.
                </p>

            </div>

            <!-- Form -->
            <div class="bg-white rounded-3xl shadow-xl border border-[#E8D6B3] p-8">

                <form action="{{ route('users.store') }}" method="POST" autocomplete="off">

                    @csrf

                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Full Name
                        </label>

                        <input type="text" name="name" autocomplete="off" required placeholder="Enter full name"
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                    </div>

                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Email Address
                        </label>

                        <input type="email" name="email" autocomplete="off" required placeholder="example@email.com"
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                    </div>

                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Role
                        </label>

                        <select name="role"
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                            <option value="admin">
                                Admin
                            </option>

                            <option value="user">
                                User
                            </option>

                        </select>

                    </div>

                    <div class="mb-6">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Password
                        </label>

                        <input type="password" name="password" autocomplete="new-password" required
                            placeholder="Enter password"
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                    </div>

                    <div class="mb-8">

                        <label class="block mb-2 font-semibold text-[#4A2A16]">
                            Confirm Password
                        </label>

                        <input type="password" name="password_confirmation" autocomplete="new-password" required
                            placeholder="Re-enter password"
                            class="w-full rounded-xl border border-[#D9C7A6] px-4 py-3 focus:ring-2 focus:ring-[#8B6F47] focus:border-[#8B6F47]">

                    </div>

                    <div class="flex justify-end gap-3">

                        <a href="{{ route('users.index') }}"
                            class="px-6 py-3 rounded-xl border border-[#8B6F47] text-[#8B6F47] hover:bg-[#F5F1EB] transition">

                            Cancel

                        </a>

                        <button type="submit"
                            class="bg-[#6B3D1E] hover:bg-[#4A2A16] text-white px-6 py-3 rounded-xl shadow-md transition">

                            Save User

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>