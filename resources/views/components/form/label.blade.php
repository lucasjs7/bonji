@props(['value'])

<label {{ $attributes->merge(['class' => 'block mb-4 font-semibold text-slate-700']) }}>
    {{ $value ?? $slot }}
</label>