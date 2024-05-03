<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pesan') }}
        </h2>
    </x-slot>
    <div class="bg-white">
        <div class="text-sm breadcrumbs max-w-7xl mx-auto lg:px-8 sm:px-6">
            <ul>
                <li><a href="{{ route('dashboard') }}" wire:navigate>Dashboard</a></li>
                <li>Pesan</li>
            </ul>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('message'))
                <div role="alert" class="alert alert-info mb-4 animate-fade-down">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="stroke-current shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session()->get('message') }}</span>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto">
                        @if ($messages->isEmpty())
                            <p class="text-center"> Tidak Ada Data yang Ditemukan</p>
                        @else
                            <table class="table table-zebra">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Isi Pesan</th>
                                        <th class='flex justify-end'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- row -->
                                    @foreach ($messages as $message)
                                        <tr>
                                            <th>{{ $loop->index + 1 }}</th>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ $message->message }}</td>
                                            <td class="flex gap-2 justify-end">
                                                <div class="tooltip" data-tip="Hapus">
                                                    <form action="{{ route('pesan.delete', $message->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="bg-red-400 rounded text-white p-1"
                                                            onclick="return confirm('Apakah yakin untuk menghapusnya?')">
                                                            <svg height="24" version="1.1" viewBox="0 0 24 24"
                                                                width="24" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <title />
                                                                <desc />
                                                                <defs />
                                                                <g fill="none" fill-rule="evenodd" id="Page-1"
                                                                    stroke="none" stroke-width="1">
                                                                    <g fill="#ffffff" id="Core"
                                                                        transform="translate(-294.000000, -126.000000)">
                                                                        <g id="delete"
                                                                            transform="translate(299.000000, 129.000000)">
                                                                            <path
                                                                                d="M1,16 C1,17.1 1.9,18 3,18 L11,18 C12.1,18 13,17.1 13,16 L13,4 L1,4 L1,16 L1,16 Z M14,1 L10.5,1 L9.5,0 L4.5,0 L3.5,1 L0,1 L0,3 L14,3 L14,1 L14,1 Z"
                                                                                id="Shape" />
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="my-8">
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
