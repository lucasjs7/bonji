<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-12 gap-4 px-8 py-12">
        <x-dashboard-card class="col-span-4">
            <x-slot name="title">Produtos</x-slot>
            <x-slot name="subtitle">Número de produtos cadastrados</x-slot>
            <x-slot name="number">0</x-slot>
        </x-dashboard-card>
        <x-dashboard-card class="col-span-4">
            <x-slot name="title">Clientes</x-slot>
            <x-slot name="subtitle">Número de clientes cadastrados</x-slot>
            <x-slot name="number">0</x-slot>
        </x-dashboard-card>
        <x-dashboard-card class="col-span-4">
            <x-slot name="title">Pedidos</x-slot>
            <x-slot name="subtitle">Número de pedidos pendentes</x-slot>
            <x-slot name="number">0</x-slot>
        </x-dashboard-card>
    </div>
</x-app-layout>
