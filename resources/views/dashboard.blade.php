<x-app-layout>
    <x-slot name="header">
        <x-admin-title-page>Dashboard</x-admin-title-page>
    </x-slot>

    <x-body>
        <x-card class="col-span-4">
            <x-slot name="title">Produtos</x-slot>
            <x-slot name="subtitle">Número de produtos cadastrados</x-slot>
            <x-slot name="number">0</x-slot>
        </x-dashboard-card>
        <x-card class="col-span-4">
            <x-slot name="title">Clientes</x-slot>
            <x-slot name="subtitle">Número de clientes cadastrados</x-slot>
            <x-slot name="number">0</x-slot>
        </x-dashboard-card>
        <x-card class="col-span-4">
            <x-slot name="title">Pedidos</x-slot>
            <x-slot name="subtitle">Número de pedidos pendentes</x-slot>
            <x-slot name="number">0</x-slot>
        </x-dashboard-card>
    </x-body>
</x-app-layout>
