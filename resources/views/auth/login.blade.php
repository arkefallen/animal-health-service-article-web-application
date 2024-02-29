<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @if(Session::has('success_register'))
    <div class="rounded-xl border border-gray-600 bg-gray-900 p-4 alert mb-4">
        <div class="flex items-start gap-4">
            <span class="text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>

            <div class="flex-1">
                <strong class="block font-medium text-white">Proses berhasil</strong>

                <p class="mt-1 text-sm text-gray-700">{{ Session::get('success_register') }}</p>
            </div>

            <button class="text-gray-200 transition hover:text-gray-300 dismiss-btn" onclick="closeButton(event)">
                <span class="sr-only">Dismiss popup</span>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full text-white px-2 py-2" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full text-white px-2 py-2" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ingat Saya') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="mr-3 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('Lupa Password?') }}
            </a>
            @endif

            <a class="mr-4 inline-block rounded border border-white-600 px-4 py-3 text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring active:border-white-400" href="{{ route('register') }}">
                {{ __('Daftar')}}
            </a>

            <button type="submit">
                <a class="inline-block rounded border border-white-600 bg-white px-4 py-3 text-sm font-medium text-gray-700 hover:bg-transparent hover:bg-slate-200 focus:outline-none focus:ring active:text-black">
                    {{ __('Masuk')}}
                </a>
            </button>
        </div>
    </form>
    <script>
        function closeButton(event) {
            event.preventDefault();
            const alertDiv = event.target.closest('.alert');
            alertDiv.classList.add('invisible');
            alertDiv.remove();
        }
    </script>
</x-guest-layout>