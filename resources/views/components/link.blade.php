@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-sm text-lime-700 dark:text-white uppercase font-semibold hover:underline'
            : 'text-sm text-gray-900 dark:text-white uppercase font-semibold hover:underline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
