<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- component -->
    <div class="bg-pink-400 h-screen w-screen">
        <div class="flex flex-col items-center flex-1 h-full justify-center px-0">
            <div class="flex shadow-lg w-full bg-[#FCF6F6] sm:mx-0 h-full">
                <div class="block w-[1582px] bg-cover bg-center"
                    style="background-image: url('{{ asset('img/bg-1.png') }}');">
                </div>

                <div class="flex flex-col w-full p-4">
                    <div class="flex flex-col flex-1 justify-center">
                        <h1 class="mb-6 flex self-center text-4xl text-center font-semibold font-rubik">Sign up to
                            <x-app-svg-logo />
                        </h1>

                        <div class="w-full mt-4">
                            <form class="form-horizontal w-2/5 mx-auto" method="POST" action="{{ route('register') }}">
                                @csrf
                                <!-- Name -->
                                <div class="flex flex-col mt-4" >
                                    <label for="name" class="block font-inter font-semibold text-lg text-gray-700 ">
                                        Name
                                    </label>
                                    <x-text-input id="name" class="block mt-1 w-full border-[#EBEBEB]" type="text" name="name"
                                        :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <!-- Userame -->
                                <div class="flex flex-col mt-4" >
                                    <label for="username" class="block font-inter font-semibold text-lg text-gray-700 ">
                                        Username
                                    </label>
                                    <x-text-input id="username" class="block mt-1 w-full border-[#EBEBEB]" type="text" name="username"
                                        :value="old('username')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                </div>
                                <!-- Email Address -->
                                <div class="flex flex-col mt-4">
                                    <label for="email" class="block font-inter font-semibold text-lg text-gray-700 ">
                                        Email
                                    </label>
                                    <x-text-input id="email" class="block mt-1 w-full border-[#EBEBEB]" type="email" name="email"
                                        :value="old('email')" required autofocus autocomplete="email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <!-- Password -->
                                <div class="flex flex-col mt-4">
                                    <label for="password" class="block font-inter font-semibold text-lg text-gray-700 ">
                                        Password
                                    </label>
                                    <x-text-input id="password" class="block mt-1 w-full border-[#EBEBEB]" type="password"
                                        name="password" required autocomplete="new-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <!-- Confirm Password -->
                                {{-- <div class="flex flex-col mt-4">
                                    <label for="password" class="block font-inter font-semibold text-lg text-gray-700 ">
                                        Confirm Password
                                    </label>
                                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div> --}}
                                <!-- ToS -->
                                <div class="flex flex-col mt-4">
                                    <label for="tos" class="inline-flex items-center">
                                        <input required id="tos" type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                            name="tos" required>
                                        <span class="ms-2 font-inter text-sm text-gray-600">
                                            By creating an account you agree with our <a href="#" class="underline">Terms of Service</a>, 
                                            <a href="#" class="underline">Privacy Policy</a>, and our default 
                                            <a href="#" class="underline">Notification Settings</a>.
                                        </span>
                                    </label>
                                    <x-input-error :messages="$errors->get('tos')" class="mt-2" />
                                </div>
                                <div class="flex flex-col mt-8">
                                    <button
                                        class="rounded-full px-5 py-4 bg-[color:#FD507E] text-lg font-medium font-inter text-white border hover:bg-[color:#E34871]"
                                        type="submit">Create Account
                                    </button>
                                </div>
                            </form>
                            <div class="flex text-center mt-4 items-center justify-center">
                                <p class="mr-2 antialiased font-inter text-[color:#6A6A6A] text-sm">Already have an
                                    account?</p>
                                <a class="underline antialiased font-inter text-medium text-blue-dark text-sm"
                                    href="{{ route('login') }}">
                                    Sign In
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
