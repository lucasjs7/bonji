<select {{ $attributes->merge(['class' => 'w-full h-9 mt-1 px-2 py-1 rounded-[4px] border border-slate-300 font-normal focus:border-blue-600 focus:outline-none focus:ring-0 focus:ring-transparent']) }}>
    {{ $slot }}
</select>