@props(['url', 'active' => false])

@php
    $classes = ($active ?? false)
                ? 'flex items-center justify-center xl:justify-start text-blue-400 mb-8 transition duration-350 ease-in-out'
                : 'flex items-center justify-center xl:justify-start text-gray-800 dark:text-white hover:text-blue-400 dark:hover:text-blue-400 mb-8 transition duration-350 ease-in-out';
@endphp

<a href="{{ $url }}" wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
