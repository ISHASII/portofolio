@props(['active' => false])

@php
    $classes = $active ? 'text-sm text-gray-900 font-semibold' : 'text-sm text-gray-600';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
