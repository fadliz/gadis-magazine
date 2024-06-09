<x-app-layout>
    <div class="flex items-center justify-center">
        <!-- Main Content -->
        <div class="w-full p-4 mx-auto mr-[120px] ml-[120px] mt-[23px]">
            <div class="mx-auto sm:px-6 lg:px-8 space-y-12 pb-32">
                <div class="flex py-6 mt-[40px] justify-between">
                    <button id="backBtn"
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
                    <div class="w-full mx-8 content-center ">
                        @include('profile.partials.update-profile-password-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.getElementById('backBtn').addEventListener('click', function() {
        window.history.back();
    });
</script>
