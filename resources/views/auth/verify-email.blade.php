<x-app-layout :pageTitle="__('page.verify_email_title')">
<div class="w-full sm:max-w-md mx-auto mt-8 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('page.verify_email_description') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('page.verify_email_success') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit" class="bg-orange-500 hover:bg-orange-400">
                        {{ __('page.verify_email_action_resend_email') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('page.verify_email_action_logout') }}
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
