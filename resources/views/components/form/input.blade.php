@php

$class = '';

if (in_array($type, ['text', 'number', 'email', 'password', 'tel', 'week', 'url', 'date', 'time', 'search', 'datetime', 'datetime-local', 'month'])) {
    $class = 'w-full h-9 mt-1 px-2 py-1 rounded-[4px] border border-slate-300 font-normal focus:border-blue-600 focus:outline-none focus:ring-0 focus:ring-transparent';
} elseif ($type == 'checkbox') {
    $class = 'mr-0.5 rounded-[2px] focus:outline-none focus:ring-0 focus:ring-transparent';
} elseif ($type == 'radio') {
    $class = 'focus:outline-none focus:ring-0 focus:ring-transparent';
} elseif ($type == 'file') {
    $class = 'w-full mt-1 font-normal focus:border-blue-600 focus:outline-none focus:ring-0 focus:ring-transparent';
}

@endphp

<input {{ $attributes->merge(['class' => $class]) }}>