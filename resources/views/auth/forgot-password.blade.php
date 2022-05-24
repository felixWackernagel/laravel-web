<x-app-layout :pageTitle="__('page.forgot_password_title')">
    <div class="w-full sm:max-w-md mx-auto mt-8 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

        <div class="mb-4 text-sm text-gray-600">
            {{ __('page.forgot_password_description') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('page.forgot_password_field_email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="bg-orange-500 hover:bg-orange-400">
                    {{ __('page.forgot_password_action_reset') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</x-app-layout>
