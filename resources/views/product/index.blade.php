<x-app-layout>
    <x-slot name="header">
        <x-admin-title-page>Produtos</x-admin-title-page>
    </x-slot>
    <x-body>
        <div class="col-span-8">
            <x-button bg="blue-600" href="{{ route('admin.products.create') }}">
                <x-slot name="svg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"/></svg>
                </x-slot>
                Novo Produto
            </x-button>
        </div>
        <div class="col-span-4">
            <form action="{{ route('admin.products.index') }}" method="get" class="flex flex-row">
                <x-form.input type="text" name="search" value="{{ request()->search }}" class="h-[38px] mt-0 mr-2"/>
                <x-button type="submit" class="pr-3" bg="blue-600">
                    <x-slot name="svg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"/></svg>
                    </x-slot>
                </x-button>
            </form>
        </div>
        <x-box class="col-span-12">
            <div class="col-span-12">
                <x-crud.table>
                    <x-crud.thead>
                        <x-crud.tr>
                            <x-crud.th width="1">#</x-crud.th>
                            <x-crud.th>Nome</x-crud.th>
                            <x-crud.th>Preço</x-crud.th>
                            <x-crud.th></x-crud.th>
                        </x-crud.tr>
                    </x-crud.thead>
                    <x-crud.tbody>
                        @forelse($products as $product)
                            <x-crud.tr>
                                <x-crud.td>{{ $product->id }}</x-crud.td>
                                <x-crud.td>{{ $product->name }}</x-crud.td>
                                <x-crud.td>{{ $product->price }}</x-crud.td>
                                <x-crud.td class="flex flex-wrap items-center justify-end">
                                    <x-button class="px-0" pattern="clear" bg="slate-400 ml-1">
                                        <x-slot name="svg">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg>
                                        </x-slot>
                                    </x-button>
                                    <x-button href="{{ route('admin.products.media.index', $product->id) }}" class="px-0" pattern="clear" bg="slate-400 ml-1">
                                        <x-slot name="svg">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M5 11.1l2-2 5.5 5.5 3.5-3.5 3 3V5H5v6.1zm0 2.829V19h3.1l2.986-2.985L7 11.929l-2 2zM10.929 19H19v-2.071l-3-3L10.929 19zM4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm11.5 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                                        </x-slot>
                                    </x-button>
                                    <x-button href="{{ route('admin.products.edit', $product->id) }}" class="px-0" pattern="clear" bg="slate-400 ml-1">
                                        <x-slot name="svg">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"/></svg>
                                        </x-slot>
                                    </x-button>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <x-button type="submit" class="px-0" pattern="clear" bg="slate-400 ml-1">
                                            <x-slot name="svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zM9 4v2h6V4H9z"/></svg>
                                            </x-slot>
                                        </x-button>
                                    </form>
                                </x-crud.td>
                            </x-crud.tr>
                        @empty
                        <x-crud.tr>
                            <x-crud.td class="text-center !pt-8 !pb-6" colspan="6">
                                <p>Nenhum registro encontrado.</p>
                                @if(!empty(request()->search))
                                    <x-button href="{{ route('admin.products.index') }}" bg="blue-600" size="small" pattern="hollow" class="mt-2">
                                        <x-slot name="svg">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0H24V24H0z"/><path d="M6.929.515L21.07 14.657l-1.414 1.414-3.823-3.822L15 13.5V22H9v-8.5L4 6H3V4h4.585l-2.07-2.071L6.929.515zM9.585 6H6.404L11 12.894V20h2v-7.106l1.392-2.087L9.585 6zM21 4v2h-1l-1.915 2.872-1.442-1.443L17.596 6h-2.383l-2-2H21z"/></svg>
                                        </x-slot>
                                        Limpar filtro
                                    </x-button>
                                @endif
                            </x-crud.td>
                        </x-crud.tr>
                        @endforelse
                    </x-crud.tbody>
                </x-crud.table>
            </div>
        </x-box>
        <div class="col-span-12">
            {{ $products->links() }}
        </div>
    </x-body>

</x-app-layout>