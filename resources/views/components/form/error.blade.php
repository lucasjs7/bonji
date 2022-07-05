@if(Session::has('error') || $errors->any())

    <div class="relative bg-white border border-red-400 col-span-12 mb-4 px-6 py-4 rounded-[4px] w-full shadow">
        <span class="absolute -top-3 -left-2 w-6 h-6 bg-red-500 rounded-full text-center text-white text-sm leading-6">
            {{ $errors->count() + (Session::has('error') ? 1 : 0) }}
        </span>
        <h4 class="text-red-500 text-xl font-semibold mb-2">Erro</h4>
        <hr class="border-slate-200 mb-4"/>
        <ul>
            @if(Session::has('error'))
                <li>{{ Session::get('error') }}</li>
            @endif
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif