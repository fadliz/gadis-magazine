<nav x-data="{ open: false }" style="background-color: #FD507E;" class="border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo"
                            class="block h-7 w-auto fill-current text-gray-800" />
                    </a>
                </div>
                <!-- Navigation Links -->
            </div>

            <!-- Settings Dropdown -->
            <div class="flex items-center">
                <!-- Search Bar -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Search..."
                            class="block w-full pl-10 pr-44 py-1 border border-gray-300 rounded-full shadow-sm placeholder-gray-300 focus:outline-none focus:ring focus:border-blue-300 sm:text-sm" />
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-inter font-medium rounded-md text-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    {{-- <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z" clip-rule="evenodd" />
                                    </svg> --}}
                                </div>
                                <div class="sm:ml-2"></div>
                                <img src="{{ asset('img/fem-profile-placeholder.png') }}" alt="Profile Picture"
                                    class="h-8 w-8 rounded-full">
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="flex align-center font-inter ml-1">
                                <svg width="15" height="19" viewBox="0 0 17 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="mr-[10px]">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.17048 13.5317C4.30286 13.5317 1 14.1165 1 16.4584C1 18.8003 4.2819 19.406 8.17048 19.406C12.0381 19.406 15.34 18.8203 15.34 16.4793C15.34 14.1384 12.059 13.5317 8.17048 13.5317Z"
                                        stroke="#6A6A6A" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.17046 10.1914C10.7086 10.1914 12.7657 8.13333 12.7657 5.59524C12.7657 3.05714 10.7086 1 8.17046 1C5.63237 1 3.57425 3.05714 3.57425 5.59524C3.5657 8.12476 5.60951 10.1829 8.13808 10.1914H8.17046Z"
                                        stroke="#6A6A6A" stroke-width="1.42857" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="flex align-center text-red-600 font-inter ml-1">
                                    <svg width="18" height="18" viewBox="0 0 21 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="mr-[7px]">
                                        <path
                                            d="M13.1393 6.46581V5.64944C13.1393 3.86881 11.6955 2.42506 9.91491 2.42506H5.64928C3.86953 2.42506 2.42578 3.86881 2.42578 5.64944V15.3882C2.42578 17.1688 3.86953 18.6126 5.64928 18.6126H9.92366C11.699 18.6126 13.1393 17.1732 13.1393 15.3978V14.5727"
                                            stroke="#FF1818" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M19.0837 10.5187H8.54785" stroke="#FF1818" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.5215 7.96802L19.0835 10.5186L16.5215 13.0701" stroke="#FF1818"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>

                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
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

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
