<x-app-layout :pageTitle="__( 'page.welcome_title' )">
    <div class="flex justify-center bg-gray-100 dark:bg-gray-900 items-center">
        <div class="mx-auto w-full px-6">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <!-- <a href="{{ route('home') }}" title="{{ config('app.name', 'Laravel') }}">
                                <img src="/img/logo.svg" alt="Logo" class="h-auto w-8" />
                            </a> -->
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                {{ __( 'page.welcome_maintenance_headline' ) }}
                            </div>
                        </div>

                        <div class="ml-4">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            {{ __( 'page.welcome_maintenance_content' ) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @env('local')
                <div class="flex justify-center mt-4 items-center">
                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            @endenv
        </div>
    </div>
</x-app-layout>