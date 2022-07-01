@php

$tag = 'a';
$color = $color ?? 'white';
$bg = $bg ?? 'slate-700';
$size = $size ?? '';
$class = ['inline-flex items-center rounded-[4px] hover:cursor-pointer focus:outline-none disabled:opacity-25 transition ease-in-out duration-150'];

$palette = [
    'clear'   => "text-{$bg}",
    'hollow'  => "text-{$bg} border border-{$bg}",
    'default' => "text-{$color} border border-{$bg} bg-{$bg}"
];

$class[] = $palette[$style ?? 'default'];

switch ($size) {
    case 'small':
        $class[] = 'text-sm px-4 py-1 font-semibold';
        $size_svg = 'h-4 w-4 mr-1';
        break;
    case 'large':
        $class[] = 'text-lg px-10 py-2 font-semibold';
        $size_svg = 'h-6 w-6 mr-3';
        break;
    default:
        $class[] = 'text-base px-6 py-2 font-semibold';
        $size_svg = 'h-5 w-5 mr-2';
        break;
}

if (isset($type) && $type == 'submit') {

    $tag = 'button';

}

if (isset($svg)) {
    
    $class_svg = "<svg class=\"fill-{$color} {$size_svg}\"";
    $svg = str_replace('<svg', $class_svg, $svg);

}

@endphp

<{{ $tag }} {{ $attributes->merge(['class' => implode(' ', $class)]) }}>

    @isset($svg)
        {!! $svg !!}
    @endisset

    {{ $slot }}

</{{ $tag }}>
