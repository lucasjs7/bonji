<div {{ $attributes }}>
    <x-box class="items-center min-h-[124px]">
        <div class="col-span-8">
            <h3 class="text-xl font-bold">{{ $title }}</h3>
            <p class="leading-none mt-2 text-slate-500 text-sm">{{ $subtitle }}</p>
        </div>
        <div class="col-span-4">
            <p class="leading-none text-5xl text-right">{{ $number }}</p>
        </div>
    </x-box>
</div>