<nav x-data="{ open: false }" class="bg-[#FD507E] h-24 content-center border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="ml-[143px] shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo"
                            class="block h-[39px] w-auto fill-current text-gray-800" />
                    </a>
                </div>
                <!-- Navigation Links -->
            </div>

            <!-- Settings Dropdown / Sign In & Sign Up buttons -->
            <div class="flex items-center relative">
                <!-- Search Bar -->
                <div class="hidden lg:flex lg:items-center lg:ml-6">
                    <div class="relative">
                        <span class="absolute left-[6px] top-[12px] pl-3 flex items-center pointer-events-none">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.5054 17.9618C14.7363 17.9618 18.1661 14.532 18.1661 10.3011C18.1661 6.07019 14.7363 2.64038 10.5054 2.64038C6.27454 2.64038 2.84473 6.07019 2.84473 10.3011C2.84473 14.532 6.27454 17.9618 10.5054 17.9618Z"
                                    stroke="#B4B4B4" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M15.834 16.0271L18.8374 19.0227" stroke="#B4B4B4" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Search Something..."
                            class="pl-14 block h-[45px] w-full min-w-[200px] max-w-[600px] 2xl:w-[542px] pl-10 pr-44 py-2 border border-gray-300 rounded-full shadow-sm placeholder-gray-300 focus:outline-none focus:ring focus:border-blue-300 sm:text-lg" />
                    </div>
                </div>

                @auth
                    <!-- User is logged in -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 text-[18px] font-medium font-inter rounded-md text-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div class="mr-[13px]">{{ Auth::user()->name }}</div>

                                    <div class="ms-1"></div>
                                    <div class="sm:ml-2"></div>
                                    <img src="{{ Auth::user()->picture ? Storage::url(Auth::user()->picture) : asset('img/fem-profile-placeholder.png') }}" alt="Profile Picture"
                                        class="h-12 w-12 rounded-full mr-[130px]">
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
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    confirmLogout();"
                                        class="flex align-center text-red-600 font-inter ml-1">
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
                @else
                    <!-- User is not logged in -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <a href="{{ route('login') }}"
                            class="font-black inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 text-[18px] 
                            font-medium font-inter rounded-md text-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            Sign In
                        </a>
                        <form action="{{ route('register') }}" class="mr-[130px]">
                            <button
                                class="relative flex px-8 py-4 rounded-full items-center justify-center overflow-hidden bg-[#332C2B] font-medium text-white  
                                transition-all duration-300 before:absolute before:inset-0 before:border-0 before:border-white 
                                before:duration-100 before:ease-linear hover:bg-white hover:text-black hover:before:border-[25px]">
                                <span class="relative z-10 font-black text-sm leading-4 text-[18px] font-inter ">Sign Up</span>
                            </button>
                        </form>
                    </div>
                @endauth
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
            @auth
                <!-- User is logged in -->
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ asset('img/fem-profile-placeholder.png') }}"
                            alt="Profile Picture" />
                    </div>
                    <div class="ml-3">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    </div>
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
                                    confirmLogout();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <!-- User is not logged in -->
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')">
                        {{ __('Sign In') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')">
                        {{ __('Sign Up') }}
                    </x-responsive-nav-link>
                </div>
            @endauth
        </div>
    </div>
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Log Out',
                text: 'Are you sure you want to logout from your account?',
                showCancelButton: true,
                confirmButtonColor: '#FF1818',
                cancelButtonColor: '#E2E2E2',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'flex bg-[#FF1818] text-white font-extrabold py-[16px] px-[130px] mr-[10px] rounded-full my-2 order-2',
                    cancelButton: 'flex bg-[#E2E2E2] text-[color:#332C2B] font-extrabold py-[16px] px-[130px] mr-[10px] rounded-full order-1'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
</nav>
