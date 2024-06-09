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
                        <h1 class="mb-10 flex self-center text-4xl text-center font-semibold font-rubik">Sign in to
                            <x-app-svg-logo />
                        </h1>

                        <div class="w-full mt-4">
                            <form class="form-horizontal w-2/5 mx-auto" method="POST" action="{{ route('login') }}">
                                @csrf
                                <!-- Username or Email -->
                                <div>
                                    <label for="login" class="block font-inter font-semibold text-lg text-gray-700 ">
                                        Username or Email
                                    </label>
                                    <x-text-input id="login" class="block mt-1 w-full border-[#EBEBEB]" type="text" name="login"
                                        :value="old('login')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('login')" class="mt-2" />
                                </div>
                                <!-- Password -->
                                <div class="flex flex-col mt-4">
                                    <div class="flex flex-row justify-between">
                                        <label for="password"
                                            class="block font-inter font-semibold text-lg text-gray-700 ">
                                            Password
                                        </label>
                                        @if (Route::has('password.request'))
                                            <a class="underline font-inter text-base text-blue-dark mt-1"
                                                href="#">
                                                Forgot?
                                            </a>
                                        @endif
                                    </div>
                                    <x-text-input id="password" class="block mt-1 w-full border-[#EBEBEB]" type="password"
                                        name="password" required autocomplete="current-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                            name="remember">
                                        <span
                                            class="ms-2 font-inter text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                                <div class="flex flex-col mt-8">
                                    <button
                                        class="rounded-full px-5 py-4 bg-[color:#FD507E] text-lg font-medium font-inter text-white border hover:bg-[color:#E34871]"
                                        type="submit">Sign In
                                    </button>
                                </div>
                            </form>
                            <div class="flex text-center mt-4 items-center justify-center">
                                <p class="mr-2 antialiased font-inter text-[color:#6A6A6A] text-sm">Don’t have an
                                    account?</p>
                                <a class="underline antialiased font-inter text-medium text-blue-dark text-sm"
                                    href="{{ route('register') }}">
                                    Sign Up
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
