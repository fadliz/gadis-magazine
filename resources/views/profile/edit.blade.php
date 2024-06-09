<x-app-layout>
    <div class="flex items-center justify-center">
        <!-- Main Content -->
        <div class="w-full p-4 mx-auto mr-[120px] ml-[120px] mt-[23px]">
            <div class="mx-auto sm:px-6 lg:px-8 space-y-12 pb-32">
                <div class="flex py-6 mt-[40px] justify-between">
                    <button
                        class="ml-2 bg-[#FFEAEA] text-pink-500 flex items-center border border-[#FD507E] rounded-full px-5 py-3 hover:bg-pink-100">
                        <svg class="w-6 h-6 mr-2 text-[#FD507E]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M10 5H1m0 0 4 4M1 5l4-4" />
                        </svg>
                        <span class="text-[#FD507E] text-lg font-rubik">Back</span>
                    </button>
                    <h1
                        class="tracking-wide subpixel-antialiased text-5xl font-extrabold font-rubik text-[color:#332C2B] text-center content-center">
                        Edit Profile</h1>
                    {{-- placeholder button to evenly distribute items --}}
                    <button
                        class="invisible ml-2 bg-[#FFEAEA] text-pink-500 flex items-center border border-[#FD507E] rounded-full px-5 py-3 hover:bg-pink-100">
                        <svg class="w-6 h-6 mr-2 text-[#FD507E]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M10 5H1m0 0 4 4M1 5l4-4" />
                        </svg>
                        <span class="text-[#FD507E] text-lg font-rubik">Back</span>
                    </button>
                    {{--  --}}
                </div>
                <div class="p-4 sm:p-8 border border-[#B4B4B4] bg-white shadow sm:rounded-lg flex mx-2 h-[586px]">
                    <div class="w-1/5 ml-2 flex flex-col items-center self-center mb-8">
                        <label class="text-center mb-4 text-lg font-semibold font-inter text-black">Photo
                            Profile</label>
                        <img src={{ asset('img/fem-profile-placeholder.png') }} alt="Profile Image"
                            class="w-2/3 h-2/3 ml-2 mb-4">
                        <button
                            class="mt-5 py-1 px-4 font-medium text-lg border border-[#6A6A6A] rounded text-[#6A6A6A] flex items-center hover:bg-pink-100">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="mr-2 flex items-center">
                                <path
                                    d="M7.38948 8.984H6.45648C4.42148 8.984 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.984 17.5975 8.984L16.6545 8.984"
                                    stroke="#6A6A6A" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12.0215 2.19051V14.2315" stroke="#6A6A6A" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.10645 5.1188L12.0214 2.1908L14.9374 5.1188" stroke="#6A6A6A"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Choose File</button>
                    </div>
                    <div class="w-3/4 ml-8 content-center">
                        @include('profile.partials.update-profile-password-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
