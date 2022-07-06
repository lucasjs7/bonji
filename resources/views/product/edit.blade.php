<x-app-layout>
    <x-slot name="header">
        <x-admin-title-page>Edição de Produto</x-admin-title-page>
    </x-slot>
    <x-body>
        <form action="{{ route('admin.products.update', $product->id) }}" method="post" class="grid grid-cols-12 contents-start col-span-12">
            @method('PUT')
            @include('product._partials.form')
            <div class="col-span-12">
                <x-button type="submit" bg="blue-600">
                    <x-slot name="svg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"/></svg>
                    </x-slot>
                    Editar
                </x-button>
            </div>
        </form>
    </x-body>
</x-app-layout>