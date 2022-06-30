@php

$classes = ($active ?? false)
                ? 'fill-white mb-2'
                : 'fill-slate-800 mb-2';

@endphp

<svg {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</svg>