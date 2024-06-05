<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

    <div class="flex items-center justify-center">
        <!-- Main Content -->
        <div class="w-3/4 p-4 mx-auto">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="flex items-center w-full p-6">
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
                    <h1
                        class="tracking-wide subpixel-antialiased text-3xl font-extrabold font-rubik text-center mx-auto">
                        Edit Profile</h1>
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex">
                    <div class="w-1/4 flex flex-col items-center">
                        <img src="path/to/profile-image.png" alt="Profile Image" class="w-32 h-32 rounded-full mb-4">
                        <label class="text-center">Photo Profile</label>
                        <button class="mt-4 py-2 px-4 border rounded bg-gray-200">Choose File</button>
                    </div>
                    <div class="w-3/4 ml-8">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="username">Username</label>
                                <input type="text" id="username" class="border rounded w-full py-2 px-3">
                            </div>
                            <div>
                                <label for="name">Name</label>
                                <input type="text" id="name" class="border rounded w-full py-2 px-3">
                            </div>
                            <div>
                                <label for="email">Email</label>
                                <input type="email" id="email" class="border rounded w-full py-2 px-3">
                            </div>
                            <div>
                                <label for="password">Password</label>
                                <input type="password" id="password" class="border rounded w-full py-2 px-3">
                            </div>
                        </div>
                        <button class="mt-8 py-2 px-4 bg-pink-500 text-white rounded">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
