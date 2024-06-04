<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/6 p-4 bg-white">
            <ul class="mt-6">
                <li class="flex items-center ml-6">
                    <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.17048 13.5317C4.30286 13.5317 1 14.1165 1 16.4584C1 18.8003 4.2819 19.406 8.17048 19.406C12.0381 19.406 15.34 18.8203 15.34 16.4793C15.34 14.1384 12.059 13.5317 8.17048 13.5317Z"
                            stroke="#6A6A6A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.17046 10.1914C10.7086 10.1914 12.7657 8.13333 12.7657 5.59524C12.7657 3.05714 10.7086 1 8.17046 1C5.63237 1 3.57425 3.05714 3.57425 5.59524C3.5657 8.12476 5.60951 10.1829 8.13808 10.1914H8.17046Z"
                            stroke="#6A6A6A" stroke-width="1.42857" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <a href="{{ route('profile.edit') }}" class="text-gray-600 font-inter ml-4">Edit Profile</a>
                </li>
                <li class="flex items-center ml-6 mt-6">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.1393 6.46581V5.64944C13.1393 3.86881 11.6955 2.42506 9.91491 2.42506H5.64928C3.86953 2.42506 2.42578 3.86881 2.42578 5.64944V15.3882C2.42578 17.1688 3.86953 18.6126 5.64928 18.6126H9.92366C11.699 18.6126 13.1393 17.1732 13.1393 15.3978V14.5727"
                            stroke="#FF1818" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M19.0837 10.5187H8.54785" stroke="#FF1818" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M16.5215 7.96802L19.0835 10.5186L16.5215 13.0701" stroke="#FF1818" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <a href="{{ route('logout') }}" class="text-red-600 font-inter ml-3"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="w-3/4 p-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="flex items-center w-full p-6 ">
                    <button
                        class="text-pink-500 flex items-center border border-pink-500 rounded-full px-5 py-3 hover:bg-pink-100"
                        style="background-color: #FFEAEA;">
                        <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M10 5H1m0 0 4 4M1 5l4-4" />
                        </svg>
                        <span>Back</span>
                    </button>
                    <h1 class="tracking-wide subpixel-antialiased text-3xl font-extrabold font-rubik text-center mx-auto">Edit Profile</h1>
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
