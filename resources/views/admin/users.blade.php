<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengguna/User') }}
        </h2>
    </x-slot>
    <div class="bg-white">
        <div class="text-sm breadcrumbs max-w-7xl mx-auto lg:px-8 sm:px-6">
            <ul>
                <li><a href="{{ route('dashboard') }}" wire:navigate>Dashboard</a></li>
                <li>Pengguna</li>
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
                        @if ($users->isEmpty())
                            <p class="text-center">Tidak Ada Data yang Ditemukan</p>
                        @else
                            <table class="table table-zebra mt-10">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th class='flex justify-end'>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- row -->
                                    @foreach ($users as $user)
                                        <tr>
                                            <th>{{ $loop->index + 1 }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td class="flex gap-2 justify-end">
                                                <div class="dropdown dropdown-top dropdown-end">
                                                    <div tabindex="0" role="button" class="btn p-1 bg-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                                        </svg>
                                                    </div>
                                                    <ul tabindex="0"
                                                        class="dropdown-content z-10 menu p-2 shadow bg-base-100 rounded-box w-52">
                                                        <li>
                                                            @if ($user->role == 'admin')
                                                                <form
                                                                    action="{{ route('user.grant-admin', $user->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <button>
                                                                        Lepas Admin
                                                                    </button>
                                                                </form>
                                                            @else
                                                                <form
                                                                    action="{{ route('user.grant-admin', $user->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <button>
                                                                        Jadikan Admin
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </li>
                                                        <li><a>Hapus</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="my-8">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
