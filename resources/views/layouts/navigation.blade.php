<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto flex justify-between px-4 lg:px-0">
        <div class="flex items-center justify-between w-full h-24">
            <!-- Logo -->
            <div class="shrink-0 flex items-center gap-3 w-[500px] max-md:w-[300px]">
                <a href="{{ route('home') }}">
                    <img class="h-16" src="{{ asset('images/logos/logo.png') }}" alt="Menara Hijau Logo">
                </a>
                <div class="border-l-2 border-[#017B48] pl-3">
                    <h1 class="text-[#017B48] font-bold text-xl">Menara Hijau</h1>
                    <h1 class="text-neutral-600 text-sm">A Better Place to be Your Office.</h1>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex space-x-8">
                @guest
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')"
                        Icon="images/icons/home_icon_inactive.png"
                        activeIcon="images/icons/home_icon.png">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('lantai.index')" :active="request()->routeIs('lantai.index')"
                        Icon="images/icons/floor_icon_inactive.png"
                        activeIcon="images/icons/floor_icon_active.png">
                        {{ __('Pilih Lantai') }}
                    </x-nav-link>
                @endguest

                @auth
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('management.index')" :active="request()->routeIs('management.index')">
                        {{ __('Manage Rooms') }}
                    </x-nav-link>
                    <x-nav-link :href="route('management.index')" :active="request()->routeIs('management.index')">
                        {{ __('Manage Tenants') }}
                    </x-nav-link>
                    @if (Auth::user()->role === 'superAdmin')
                        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                            {{ __('Manage Users') }}
                        </x-nav-link>
                    @endif
                @endauth
            </div>

            <!-- User Settings Dropdown -->
            @auth
            <div class="hidden lg:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ml-1 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endauth

            <!-- Mobile Hamburger -->
            <div class="flex items-center lg:hidden">
                <button @click="open = !open"
                    class="p-2 text-gray-400 rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                    <svg x-show="!open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="lg:hidden">
        @guest
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('lantai.index')" :active="request()->routeIs('lantai.index')">
                {{ __('Pilih Lantai') }}
            </x-responsive-nav-link>
        </div>
        @endguest

        @auth
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('management.index')" :active="request()->routeIs('management.index')">
                {{ __('Rooms Management') }}
            </x-responsive-nav-link>
            @if (Auth::user()->role === 'superAdmin')
                <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                    {{ __('Users Management') }}
                </x-responsive-nav-link>
            @endif
        </div>
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-gray-800 font-medium">{{ Auth::user()->name }}</div>
                <div class="text-gray-500 text-sm">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>
