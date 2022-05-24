<x-app-layout :pageTitle="__('page.login_title')">

    <div class="w-full sm:max-w-md mx-auto mt-8 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('page.login_field_email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('page.login_field_password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('page.login_field_remember_me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('page.login_link_password_forgotten') }}
                    </a>
                @endif

                <x-jet-button class="ml-4 bg-orange-500 hover:bg-orange-400">
                    {{ __('page.login_action_login') }}
                </x-jet-button>
            </div>
        </form>

    </div>

</x-app-layout>
