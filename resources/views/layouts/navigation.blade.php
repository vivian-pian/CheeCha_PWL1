<nav x-data="{ open: false }" class="bg-[#FFFDF8] border-b border-[#E8D6B3] shadow-md">

    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="flex justify-between h-20">

            <div class="flex items-center">

                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">

                    <img src="{{ asset('aset/Logo baru lavenir.jpeg') }}" alt="L'Avenir Logo"
                        class="h-14 w-14 rounded-full object-cover shadow-md">

                    <div>

                        <h1 class="text-xl font-bold text-[#4A2A16]">
                            L'AVENIR
                        </h1>

                        <p class="text-xs text-[#8B6B52] uppercase tracking-widest">
                            Boulangerie
                        </p>

                    </div>

                </a>

            </div>

            <div class="hidden sm:flex items-center gap-4">

                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    Dashboard
                </x-nav-link>

                <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                    Users
                </x-nav-link>

                <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
                    Products
                </x-nav-link>

                <x-nav-link :href="route('sales.index')" :active="request()->routeIs('sales.*')">
                    Sales
                </x-nav-link>

            </div>

            <div class="hidden sm:flex sm:items-center">

                <x-dropdown align="right" width="56">

                    <x-slot name="trigger">

                        <button
                            class="flex items-center gap-3 px-4 py-2 rounded-xl border border-[#E8D6B3] bg-white hover:bg-[#F5F1EB] transition">

                            <div
                                class="w-10 h-10 rounded-full bg-[#6B3D1E] text-white flex items-center justify-center font-bold">

                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                            </div>

                            <div class="text-left">

                                <div class="font-semibold text-[#4A2A16]">
                                    {{ Auth::user()->name }}
                                </div>

                                <div class="text-xs text-gray-500">
                                    {{ ucfirst(Auth::user()->role) }}
                                </div>

                            </div>

                            <svg class="w-4 h-4 text-[#4A2A16]" xmlns="http://www.w3.org/2000/svg" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />

                            </svg>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">

                            Logout

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            <div class="flex items-center sm:hidden">

                <button @click="open = ! open" class="p-2 rounded-lg hover:bg-[#E8D6B3] transition">

                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">

                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </button>

            </div>

        </div>

    </div>

</nav>