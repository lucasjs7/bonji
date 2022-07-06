<x-app-layout>
    <x-slot name="header">
        <x-admin-title-page>Nova Mídia para {{ $product->name }}</x-admin-title-page>
    </x-slot>
    <x-body>
        <form action="{{ route('admin.products.media.store', $product->id) }}" method="post" enctype="multipart/form-data" class="grid grid-cols-12 contents-start col-span-12">
            @include('product.media._partials.form')
            <div class="col-span-12">
                <x-button type="submit" bg="blue-600">
                    <x-slot name="svg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"/></svg>
                    </x-slot>
                    Adicionar
                </x-button>
            </div>
        </form>
    </x-body>
</x-app-layout>