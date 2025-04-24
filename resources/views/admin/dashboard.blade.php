<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-xl font-semibold">Selamat Datang di Dashboard!</h1>
                    <div x-data>
                        <x-primary-button @click="$dispatch('open-modal', 'tambah-barang')">
                            tambah barang
                        </x-primary-button>
                    
                        <x-modal name="tambah-barang" :show="false" max-width="lg">
                            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full"></x-text-input>
                        </x-modal>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>