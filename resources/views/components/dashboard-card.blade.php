<div {{ $attributes }}>
    <div class="bg-white overflow-hidden shadow-sm rounded-[4px]">
        <div class="flex flex-row items-center p-6 min-h-[124px] bg-white border-b border-slate-200">
            <div class="basis-8/12">
                <h3 class="text-xl font-bold">{{ $title }}</h3>
                <p class="leading-none mt-2 text-slate-500 text-sm">{{ $subtitle }}</p>
            </div>
            <div class="basis-4/12">
                <p class="leading-none text-5xl text-right">{{ $number }}</p>
            </div>
        </div>
    </div>
</div>