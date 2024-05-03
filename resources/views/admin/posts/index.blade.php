<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Berita dan Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h1 class="mt-4 text-2xl font-medium text-gray-900">
                        Daftar Postingan
                    </h1>

                    <p class="mt-2 text-gray-500 leading-relaxed">
                        Lihat daftar, ubah atau hapus postingan
                    </p>
                    <p>Jumlah Postingan : {{ $total }}</p>
                    <a href="{{ route('berita.list') }}" wire:navigate>
                        <x-button class="mt-4">
                            Lihat Postingan
                        </x-button>
                    </a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">

                    <h1 class="mt-4 text-2xl font-medium text-gray-900">
                        Tambah Postingan
                    </h1>

                    <p class="mt-2 text-gray-500 leading-relaxed">
                        Masukkan berita atau postingan
                    </p>
                    <a href="{{ route('berita.add') }}" wire:navigate>
                        <x-button class="mt-4">
                            Tambah Postingan
                        </x-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
