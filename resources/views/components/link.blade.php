@props(['active'])

@php
$classes = 'inline-flex items-center text-sm dark:text-white uppercase font-semibold hover:underline';
$classes .= ($active ?? false) ? ' text-lime-700' : ' text-gray-900';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if( isset( $icon ) )
        <span class="mr-2">
            {{ $icon }}
        </span>
    @endif

    {{ $slot }}
</a>
