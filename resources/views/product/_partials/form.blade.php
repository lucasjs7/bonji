@csrf
<x-form.error></x-form.error>
<x-box class="col-span-12 mb-4">
    <div class="col-span-12">
        <h3 class="text-xl font-semibold text-slate-800 mb-2">Informações</h3>
        <hr class="border-slate-200 mb-4">
    </div>
    <div class="col-span-9">
        <x-form.label>Nome
        <x-form.input type="text" name="name" value="{{ old('name') ?? @$product->name }}"/></x-form.label>
    </div>
    <div class="col-span-3">
        <x-form.label>Código
        <x-form.input type="text" name="code" value="{{ old('code') ?? @$product->code }}"/></x-form.label>
    </div>
    <div class="col-span-12">
        <x-form.label>
            Breve descrição
            <x-form.textarea type="datetime-local" rows="2" name="small_description">{{ old('small_description') ?? @$product->small_description }}</x-form.textarea>
        </x-form.label>
    </div>
    <div class="col-span-12">
        <x-form.label>
            Descrição
            <x-form.textarea type="datetime-local" rows="6" name="description">{{ old('description') ?? @$product->description }}</x-form.textarea>
        </x-form.label>
    </div>
</x-box>
<x-box class="col-span-12 mb-4">
    <div class="col-span-12">
        <h3 class="text-xl font-semibold text-slate-800 mb-2">Valores</h3>
        <hr class="border-slate-200 mb-4">
    </div>
    <div class="col-span-3">
        <x-form.label>Preço
        <x-form.input type="text" name="price" value="{{ old('price') ?? @$product->price }}"/></x-form.label>
    </div>
    <div class="col-span-2">
        <x-form.label>
            Desconto
            <x-form.input type="text" name="discount" value="{{ old('discount') ?? @$product->discount }}"/>
            <x-form.text-help>Em porcentagem (%)</x-form.text-help>
        </x-form.label>
    </div>
</x-box>
<x-box class="col-span-12 mb-4">
    <div class="col-span-12">
        <h3 class="text-xl font-semibold text-slate-800 mb-2">Detalhes</h3>
        <hr class="border-slate-200 mb-4">
    </div>
    <div class="col-span-3">
        <x-form.label>Peso
            <x-form.input type="number" name="weight" value="{{ old('weight') ?? @$product->weight }}"/>
            <x-form.text-help>Em quilograma (kg)</x-form.text-help>
        </x-form.label>
    </div>
    <div class="col-span-3">
        <x-form.label>Altura
            <x-form.input type="number" name="height" value="{{ old('height') ?? @$product->height }}"/>
            <x-form.text-help>Em centimetros (cm)</x-form.text-help>
        </x-form.label>
    </div>
    <div class="col-span-3">
        <x-form.label>Largura
            <x-form.input type="number" name="width" value="{{ old('width') ?? @$product->width }}"/>
            <x-form.text-help>Em centimetros (cm)</x-form.text-help>
        </x-form.label>
    </div>
    <div class="col-span-3">
        <x-form.label>
            Comprimento
            <x-form.input type="number" name="length" value="{{ old('length') ?? @$product->length }}"/>
            <x-form.text-help>Em centimetros (cm)</x-form.text-help>
        </x-form.label>
    </div>
</x-box>
<x-box class="col-span-12 mb-4 !pb-7">
    <div class="col-span-12">
        <h3 class="text-xl font-semibold text-slate-800 mb-2">Categorias</h3>
        <hr class="border-slate-200 mb-4">
    </div>
    @forelse($categories as $category)
        <div class="col-span-4">
            <x-form.label class="!mb-1">
                @if(@$product->checkCategory($category->id, old('categories')))
                    <x-form.input type="checkbox" name="categories[]" value="{{ $category->id }}" checked/>
                @else
                    <x-form.input type="checkbox" name="categories[]" value="{{ $category->id }}"/>
                @endif
                {{ $category->name }}
            </x-form.label>
        </div>
    @empty
        <div class="col-span-12">
            Nenhuma categoria registrada.
        </div>
    @endforelse
</x-box>
<x-box class="col-span-12 mb-4">
    <div class="col-span-12">
        <h3 class="text-xl font-semibold text-slate-800 mb-2">SEO</h3>
        <hr class="border-slate-200 mb-4">
    </div>
    <div class="col-span-12">
        <x-form.label>Título da aba
            <x-form.input type="text" name="page_title" value="{{ old('page_title') ?? @$product->page_title }}"/>
        </x-form.label>
    </div>
    <div class="col-span-12">
        <x-form.label>Slug
            <x-form.input type="text" name="slug" value="{{ old('slug') ?? @$product->slug }}"/>
            <x-form.text-help>www.meusite.com.br/categoria/slug-exemplo-do-produto</x-form.text-help>
        </x-form.label>
    </div>
    <div class="col-span-12">
        <x-form.label>Meta-descrição
            <x-form.textarea rows="4" name="meta_description">{{ old('meta_description') ?? @$product->meta_description }}</x-form.textarea>
        </x-form.label>
    </div>
</x-box>