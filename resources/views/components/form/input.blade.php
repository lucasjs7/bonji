@php

$class = '';

if (in_array($type, ['text', 'number', 'email', 'password', 'tel', 'week', 'url', 'date', 'time', 'search', 'datetime', 'datetime-local', 'month'])) {
    $class = 'w-full h-9 mt-1 px-2 py-1 rounded-[4px] border border-slate-300 font-normal focus:border-blue-600 focus:outline-none focus:ring-0 focus:ring-transparent';
} elseif ($type == 'checkbox') {
    $class = '';
} elseif ($type == 'radio') {
    $class = '';
}

@endphp

<input {{ $attributes->merge(['class' => $class]) }}>