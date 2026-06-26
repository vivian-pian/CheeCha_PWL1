@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-5 py-2 rounded-xl bg-[#E8D6B3] text-[#4A2A16] font-semibold shadow-sm transition duration-300'
    : 'inline-flex items-center px-5 py-2 rounded-xl text-[#6B3D1E] font-medium hover:bg-[#F5F1EB] hover:text-[#4A2A16] transition duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>