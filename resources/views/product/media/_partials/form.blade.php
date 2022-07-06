@csrf
<x-form.error></x-form.error>
<x-box class="col-span-12 mb-4">
    <div class="col-span-6">
        <x-form.label>Arquivo
        <x-form.input type="file" name="file" value="{{ old('file') }}"/></x-form.label>
    </div>
    <div class="col-span-6">
        <x-form.label>Ordem
            <x-form.select name="order">
                <option value=""></option>
                @foreach($order as $o)
                    <option value="{{ $o['number'] }}" @selected((old('order') ?? @$media->order) == $o['number'])>
                        {{ $o['number'] }}
                        @if($o['status'])
                            (em uso)
                        @endif
                    </option>
                @endforeach
            </x-form.select>
        </x-form.label>
    </div>
</x-box>