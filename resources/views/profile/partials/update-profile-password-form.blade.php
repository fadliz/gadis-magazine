<section class="flex">
    <form method="post" action="{{ route('profile.process') }}" class="w-full mb-[16px]">
        @csrf
        @method('post')
        <div class="flex flex-col lg:flex-row items-center mt-12 gap-16 w-full px-5">
            {{-- Profile Information --}}
            <div class="flex flex-col space-y-6 w-1/2">
                <div class="flex flex-col">
                    <x-input-label for="username" :value="__('Username')"
                        class="font-inter text-[length:18px] text-[color:#6A6A6A] font-semibold mb-1" />
                    <x-text-input disabled id="username" name="username" type="text"
                        class="text-[length:18px] disabled:bg-slate-50 disabled:cursor-not-allowed flex lg:h-[52px] sm:h-full border-[color:#6A6A6A]"
                        :value="old('username', $user->username)" required autofocus autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="flex flex-col">
                    <x-input-label for="email" :value="__('Email')"
                        class="font-inter text-[length:18px] text-[color:#6A6A6A] font-semibold mb-1" />
                    <x-text-input disabled id="email" name="email" type="email"
                        class="text-[length:18px] disabled:bg-slate-50 disabled:cursor-not-allowed flex lg:h-[52px] sm:h-full border-[color:#6A6A6A]"
                        :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex flex-col space-y-5 w-1/2 mt-1.5">
                <div class="flex flex-col ">
                    <x-input-label for="name" :value="__('Name')"
                        class="font-inter text-[length:18px] text-[color:#332C2B] font-semibold mb-1" />
                    <div class="relative rounded-md shadow-sm ">
                        <x-text-input disabled id="name" name="name" type="text"
                            class="text-[length:18px] w-full pr-10 disabled:bg-slate-50 disabled:cursor-not-allowed flex lg:h-[52px] sm:h-full border-black"
                            :value="old('name', $user->name)" required autofocus autocomplete="name" />
                        <button id="toggleNameAvailability" type="button"
                            class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-500 focus:outline-none">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.492 2.03671C11.906 2.03671 12.242 2.37271 12.242 2.78671C12.242 3.20071 11.906 3.53671 11.492 3.53671H7.753C5.169 3.53671 3.5 5.30671 3.5 8.04571V16.3597C3.5 19.0987 5.169 20.8687 7.753 20.8687H16.577C19.161 20.8687 20.831 19.0987 20.831 16.3597V12.3317C20.831 11.9177 21.167 11.5817 21.581 11.5817C21.995 11.5817 22.331 11.9177 22.331 12.3317V16.3597C22.331 19.9537 20.018 22.3687 16.577 22.3687H7.753C4.312 22.3687 2 19.9537 2 16.3597V8.04571C2 4.45171 4.312 2.03671 7.753 2.03671H11.492ZM20.2016 2.91531L21.4186 4.13231C22.0116 4.72431 22.3376 5.51131 22.3366 6.34931C22.3366 7.1873 22.0106 7.97331 21.4186 8.56431L13.9096 16.0733C13.3586 16.6243 12.6246 16.9283 11.8446 16.9283H8.0986C7.8966 16.9283 7.7026 16.8463 7.5616 16.7013C7.4206 16.5573 7.3436 16.3623 7.3486 16.1593L7.4426 12.3803C7.4616 11.6283 7.7646 10.9213 8.2966 10.3883L15.7706 2.91531C16.9926 1.69531 18.9796 1.69531 20.2016 2.91531ZM15.155 5.65131L9.3576 11.4493C9.0986 11.7083 8.9516 12.0523 8.9426 12.4173L8.8676 15.4283H11.8446C12.2246 15.4283 12.5806 15.2813 12.8496 15.0123L18.682 9.17831L15.155 5.65131ZM16.8306 3.97631L16.215 4.59031L19.742 8.11831L20.3586 7.50331C20.6666 7.19531 20.8366 6.78531 20.8366 6.34931C20.8366 5.91231 20.6666 5.50131 20.3586 5.19331L19.1416 3.97631C18.5046 3.34131 17.4686 3.34131 16.8306 3.97631Z"
                                    fill-rule="evenodd" clip-rule="evenodd" fill="#332C2B" />
                            </svg>
                        </button>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                {{-- Password Form --}}
                <div class="flex flex-col pb-1">
                    <x-input-label for="update_password_password" :value="__('Password')"
                        class="font-inter text-[length:18px] text-[color:#332C2B] font-semibold mb-1" />
                    <div class="relative rounded-md shadow-sm border ">
                        <x-text-input disabled id="update_password_password" name="password" type="password"
                            class="text-[length:18px] flex disabled:bg-slate-50 disabled:cursor-not-allowed w-full pr-10 lg:h-[52px] sm:h-full border-black"
                            autocomplete="new-password" />
                        <button id="togglePasswordAvailability" type="button"
                            class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-500 focus:outline-none">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.492 2.03671C11.906 2.03671 12.242 2.37271 12.242 2.78671C12.242 3.20071 11.906 3.53671 11.492 3.53671H7.753C5.169 3.53671 3.5 5.30671 3.5 8.04571V16.3597C3.5 19.0987 5.169 20.8687 7.753 20.8687H16.577C19.161 20.8687 20.831 19.0987 20.831 16.3597V12.3317C20.831 11.9177 21.167 11.5817 21.581 11.5817C21.995 11.5817 22.331 11.9177 22.331 12.3317V16.3597C22.331 19.9537 20.018 22.3687 16.577 22.3687H7.753C4.312 22.3687 2 19.9537 2 16.3597V8.04571C2 4.45171 4.312 2.03671 7.753 2.03671H11.492ZM20.2016 2.91531L21.4186 4.13231C22.0116 4.72431 22.3376 5.51131 22.3366 6.34931C22.3366 7.1873 22.0106 7.97331 21.4186 8.56431L13.9096 16.0733C13.3586 16.6243 12.6246 16.9283 11.8446 16.9283H8.0986C7.8966 16.9283 7.7026 16.8463 7.5616 16.7013C7.4206 16.5573 7.3436 16.3623 7.3486 16.1593L7.4426 12.3803C7.4616 11.6283 7.7646 10.9213 8.2966 10.3883L15.7706 2.91531C16.9926 1.69531 18.9796 1.69531 20.2016 2.91531ZM15.155 5.65131L9.3576 11.4493C9.0986 11.7083 8.9516 12.0523 8.9426 12.4173L8.8676 15.4283H11.8446C12.2246 15.4283 12.5806 15.2813 12.8496 15.0123L18.682 9.17831L15.155 5.65131ZM16.8306 3.97631L16.215 4.59031L19.742 8.11831L20.3586 7.50331C20.6666 7.19531 20.8366 6.78531 20.8366 6.34931C20.8366 5.91231 20.6666 5.50131 20.3586 5.19331L19.1416 3.97631C18.5046 3.34131 17.4686 3.34131 16.8306 3.97631Z"
                                    fill-rule="evenodd" clip-rule="evenodd" fill="#332C2B" />
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>

                <div class="hidden">
                    <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                        type="password" class="flex mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="flex justify-end mt-[40px]">
            <button disabled
                class="rounded-full px-5 py-2 lg:px-[length:80px] lg:py-[length:20px] mr-6 bg-[color:#FD507E] text-xl text-white flex border disabled:bg-gray-500 hover:bg-[color:#E34871]"
                type="submit">Save
            </button>
        </div>
    </form>
</section>

<script>
    document.getElementById('update_password_password').addEventListener('input', function() {
        document.getElementById('update_password_password_confirmation').value = this.value;
    });
    const passwordInput = document.getElementById('update_password_password');
    const toggleButton = document.getElementById('togglePasswordAvailability');
    const nameInput = document.getElementById('name');
    const toggleNameButton = document.getElementById('toggleNameAvailability');
    const submitButton = document.querySelector('button[type="submit"]');
    const originalNameValue = nameInput.value;

    function updateSubmitButtonState() {
        if (passwordInput.disabled && nameInput.disabled) {
            submitButton.setAttribute('disabled', 'disabled');
        } else {
            submitButton.removeAttribute('disabled');
        }
    }
    toggleButton.addEventListener('click', function() {
        if (passwordInput.disabled) {
            passwordInput.removeAttribute("disabled");
        } else {
            passwordInput.setAttribute("disabled", "disabled");
            passwordInput.value = null;
        }
        updateSubmitButtonState();
    });
    toggleNameButton.addEventListener('click', function() {
        if (nameInput.disabled) {
            nameInput.removeAttribute("disabled");
        } else {
            nameInput.setAttribute("disabled", "disabled");
            nameInput.value = originalNameValue;
        }
        updateSubmitButtonState();
    });
</script>
