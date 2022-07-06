@csrf
<x-form.error></x-form.error>
<x-box class="col-span-12 mb-4">
    <div class="col-span-12">
        <x-form.label>Nome
        <x-form.input type="text" name="name" value="{{ old('name') ?? @$category->name }}"/></x-form.label>
    </div>
    <div class="col-span-12">
        <x-form.label>Slug
            <x-form.input type="text" name="slug" value="{{ old('slug') ?? @$category->slug }}"/>
            <x-form.text-help>www.meusite.com.br/slug-exemplo-da-categoria</x-form.text-help>
        </x-form.label>
    </div>
    <div class="col-span-12">
        <x-form.label>
            Descrição
            <x-form.textarea type="datetime-local" rows="6" name="description">{{ old('description') ?? @$category->description }}</x-form.textarea>
        </x-form.label>
    </div>
</x-box>