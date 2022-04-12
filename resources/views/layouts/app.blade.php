<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="min-h-full mb-[1px]">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- Alpine JS -->
        <script src="{{ asset('js/alpinejs.3.9.6.min.js') }}" defer></script>
    </head>
    <body 
        x-data="{ isDrawerOpen: false }"
        :class="{'overflow-hidden': isDrawerOpen}"
        class="font-sans antialiased">

        <x-navigation-component :title="$pageTitle"/>

        <main class="pt-16 xl:ml-64">

            @livewire('notification')

            {{ $slot }}

        </main>

        @stack('modals')

        @livewireScripts
    </body>
</html>
