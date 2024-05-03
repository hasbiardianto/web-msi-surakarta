<x-guest-layout>
    <x-authentication-card>

        <div class="my-4">
            <h1 class="text-xl font-semibold text-center">Masuk kedalam akun</h1>
        </div>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="flex items-end justify-end mt-4 flex-col gap-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Lupa kata sandi?') }}
                    </a>
                @endif

                <x-button class="ms-4 mb-8">
                    {{ __('Masuk') }}
                </x-button>
            </div>
        </form>
        <div class="py-8 border-t-4">
            <h2 class="font-semibold text-center">Atau masuk dengan akun google</h2>
            <x-google-login />
        </div>
    </x-authentication-card>
</x-guest-layout>
