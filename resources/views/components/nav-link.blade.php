@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex flex-col mx-2 my-1 border border-solid rounded-[4px] leading-none duration-150 ease-in-out focus:outline-none font-bold px-4 py-8 border-blue-600 text-white text-sm uppercase bg-blue-600 mr-[-16px] rounded-tr-[24px]'
            : 'inline-flex flex-col mx-2 my-1 border border-solid rounded-[4px] leading-none duration-150 ease-in-out focus:outline-none font-bold px-4 py-8 border-slate-300 text-slate-800 text-sm uppercase bg-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>