@php

$tag = 'a';
$color = $color ?? 'white';
$bg = $bg ?? 'slate-700';
$size = $size ?? '';
$style = $style ?? 'default';
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
        $size_svg = 'h-4 w-4 mr-1 ml-[-2px]';
        break;
    case 'large':
        $class[] = 'text-lg px-10 py-2 font-semibold';
        $size_svg = 'h-6 w-6 mr-3 ml-[-6px]';
        break;
    default:
        $class[] = 'text-base px-6 py-2 font-semibold';
        $size_svg = 'h-5 w-5 mr-2 ml-[-4px]';
        break;
}

if (isset($type) && $type == 'submit') {

    $tag = 'button';

}

if (isset($svg)) {
    
    $svg_color = in_array($style, ['clear', 'hollow']) ? $bg : $color;
    $class_svg = "<svg class=\"fill-{$svg_color} {$size_svg}\"";
    $svg = str_replace('<svg', $class_svg, $svg);

}

@endphp

<{{ $tag }} {{ $attributes->merge(['class' => implode(' ', $class)]) }}>

    @isset($svg)
        {!! $svg !!}
    @endisset

    {{ $slot }}

</{{ $tag }}>
