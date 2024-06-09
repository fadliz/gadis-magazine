<x-app-layout>
    <!-- Main Content -->
    <div class="w-full p-4 mx-auto flex ">
        <div class="mx-auto sm:px-6 lg:px-8 space-y-12 pb-32 flex flex-col  items-center">
            <div
                class="py-6 pl-[16px] pt-12 text-[color:#332C2B] font-rubik font-black text-[50px] flex  mt-[22px]">
                {{ __('Top 3 Most View Article') }}
            </div>

            <div class="flex flex-row ">
                <div class="max-w-sm bg-white shadow m-4">
                    <a href="#">
                        <img class="p-4" src="{{ asset('img/image-1.jpg') }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-black">
                                Noteworthy
                                technology acquisitions 2021</h5>
                        </a>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        <hr class="h-px mt-4 mb-6 bg-gray-200 -0">
                        <p class="font-normal text-gray-700 dark:text-gray-400">by someone</p>
                    </div>
                </div>
                <div class="max-w-sm bg-white shadow m-4">
                    <a href="#">
                        <img class="p-4" src="{{ asset('img/image-1.jpg') }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-black">
                                Noteworthy technology acquisitions 2021</h5>
                        </a>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        <hr class="h-px mt-4 mb-6 bg-gray-200 -0">
                        <p class="font-normal text-gray-700 dark:text-gray-400">by someone</p>
                    </div>
                </div>
                <div class="max-w-sm bg-white shadow m-4">
                    <a href="#">
                        <img class="p-4" src="{{ asset('img/image-1.jpg') }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-black">
                                Noteworthy technology acquisitions 2021</h5>
                        </a>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        <hr class="h-px mt-4 mb-6 bg-gray-200 -0">
                        <p class="font-normal text-gray-700 dark:text-gray-400">by someone</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
