<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="flex md:flex-row flex-col md:mx-0 mx-4 gap-4">
                    <div class="card w-96 bg-base-100">
                        <div class="card-body">
                            <div class="stat-title">Total Postingan</div>
                            <div class="stat-value">{{ $totalPost }}</div>
                            <div class="card-actions justify-end">
                                <a href="{{ route('dashboard.berita') }}" class="hover:scale-95 transition ease-in-out">
                                    <button class="btn btn-primary">lihat postingan</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card w-96 bg-base-100">
                        <div class="card-body">
                            <div class="stat-title">Kotak Pesan</div>
                            <div class="stat-value">{{ $totalMessage }}</div>
                            <div class="card-actions justify-end">
                                <a href="{{ route('pesan.view') }}" class="hover:scale-95 transition ease-in-out">
                                    <button class="btn btn-primary">lihat pesan</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card w-96 bg-base-100">
                        <div class="card-body">
                            <div class="stat-title">Jumlah User</div>
                            <div class="stat-value">{{ $totalUser }}</div>
                            <div class="card-actions justify-end">
                                {{-- <a href="{{ route('pesan.view') }}">
                                    <button class="btn btn-primary">lihat pesan</button>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="min-w-full mt-6 mx-auto p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                    {!! $tutorial !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
