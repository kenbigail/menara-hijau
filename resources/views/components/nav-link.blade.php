@props([
    'active' => false,
    'Icon' => 'images/icons/default_icon.png',
    'activeIcon' => 'images/icons/default_icon_active.png'
])


@php
$classes = ($active ?? false)
            ? 'gap-1 inline-flex items-center px-1 pt-1 border-b-2 border-[#017B48] font-bold leading-5 focus:outline-none focus:border-[#017B48] transition duration-150 ease-in-out text-[#017B48]'
            : 'gap-1 inline-flex items-center px-1 pt-1 border-b-2 border-transparent font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';

            $iconToDisplay = ($active ?? false) ? $activeIcon : $Icon;
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <img class="h-7" src="{{ asset($iconToDisplay) }}" alt="">
    {{ $slot }}
</a>
