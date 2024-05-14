<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Berita dan Kegiatan') }}
        </h2>
    </x-slot>
    <div class="bg-white">
        <div class="text-sm breadcrumbs max-w-7xl mx-auto lg:px-8 sm:px-6">
            <ul>
                <li><a href="{{ route('dashboard') }}" wire:navigate>Dashboard</a></li>
                <li><a href="{{ route('dashboard.berita') }}" wire:navigate>Berita</a></li>
                <li>List Berita dan Kegiatan</li>
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
                        <div>
                            <a href="{{route('berita.add')}}">
                                <button class="btn bg-indigo-800 text-white">Tambah Postingan</button>
                            </a>
                        </div>
                        @if ($posts->isEmpty())
                            <p class="text-center"> Tidak Ada Data yang Ditemukan</p>
                        @else
                            <table class="table table-zebra">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Judul</th>
                                        <th>Gambar</th>
                                        <th>Isi Berita</th>
                                        <th class='flex justify-end'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- row -->
                                    @foreach ($posts as $post)
                                        <tr>
                                            <th>{{ $loop->index + 1 }}</th>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                <img src="{{ asset('storage/posts/' . $post->image) }}"
                                                    class="max-h-[100px]" wire:model.live="image" />
                                                <div wire:loading wire:target="image">Loading Image</div>
                                            </td>
                                            <td>{{ strip_tags(Str::limit($post->body, 50)) }}</td>
                                            <td class="flex gap-2 justify-end">
                                                <a href="{{ route('berita.view', $post->slug) }}">
                                                    <div class="tooltip" data-tip="Lihat">
                                                        <button class="bg-blue-400 rounded text-white p-1">
                                                            <svg fill="none" height="24" viewBox="0 0 24 24"
                                                                width="24" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M12 16C9.80001 16 8.00001 14.2 8.00001 12C8.00001 9.8 9.80001 8 12 8C14.2 8 16 9.8 16 12C16 14.2 14.2 16 12 16ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M12 19C6.50001 19 3.30001 13.2 3.10001 13C2.90001 12.7 2.90001 12.3 3.10001 12C3.20001 11.8 6.50001 6 12 6C17.5 6 20.7 11.8 20.9 12C21.1 12.3 21.1 12.7 20.9 13C20.7 13.2 17.5 19 12 19ZM5.20001 12.5C6.00001 13.8 8.50001 17 12 17C15.5 17 18 13.8 18.8 12.5C18 11.2 15.5 8 12 8C8.50001 8 6.00001 11.2 5.20001 12.5Z"
                                                                    fill="white" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </a>
                                                <a href="{{ route('berita.edit', $post->slug) }}">
                                                    <div class="tooltip" data-tip="Edit">
                                                        <button class="bg-yellow-400 rounded text-white p-1">
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
                                                                        transform="translate(-227.000000, -126.000000)">
                                                                        <g id="create"
                                                                            transform="translate(230.000000, 129.000000)">
                                                                            <path
                                                                                d="M0,14.2 L0,18 L3.8,18 L14.8,6.9 L11,3.1 L0,14.2 L0,14.2 Z M17.7,4 C18.1,3.6 18.1,3 17.7,2.6 L15.4,0.3 C15,-0.1 14.4,-0.1 14,0.3 L12.2,2.1 L16,5.9 L17.7,4 L17.7,4 Z"
                                                                                id="Shape" />
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </a>
                                                <div class="tooltip" data-tip="Hapus">
                                                    <form action="{{ route('berita.delete', $post->id) }}"
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
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
