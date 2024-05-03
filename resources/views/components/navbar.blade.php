<div id="navbar" class="navbar z-50 transition-all ease-in-out bg-white py-0 my-0 shadow-lg sticky top-0">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0"
                class="menu menu-lg dropdown-content bg-white mt-3 z-[1] p-2 shadow font-bold rounded-box w-[300px]">
                <img src="/img/logo-msi-surakarta.jpg" alt="logo msi surakarta" class="size-[150px] mx-auto">
                <li><a href="{{ route('home') }}" wire:navigate>Beranda</a></li>
                <li><a href="{{ route('posts') }}" wire:navigate>Berita</a></li>
                <li><a href="{{ route('about') }}" wire:navigate>Tentang Kami</a></li>
                <li><a href="{{ route('contact') }}" wire:navigate>Kontak</a></li>
            </ul>
        </div>
        <img src="/img/logo-msi-surakarta.jpg" alt="logo msi surakarta" class="size-[70px]">
        {{-- <a class="text-nowrap text-sm md:text-xl">{{ config('app.title') }}</a> --}}
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1 font-bold text-base">
            <li><a href="{{ route('home') }}" wire:navigate>Beranda</a></li>
            <li><a href="{{ route('posts') }}" wire:navigate>Berita</a></li>
            <li><a href="{{ route('about') }}" wire:navigate>Tentang Kami</a></li>
            <li><a href="{{ route('contact') }}" wire:navigate>Kontak</a></li>
        </ul>
    </div>
    <div class="navbar-end">
        @if (Auth::check())
            <x-dropdown align="right" width="48" class="btn">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                {{ Auth::user()->name }}

                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </span>
                    @endif
                </x-slot>

                <x-slot name="content">
                    @if (Auth::user()->role == 'admin')
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Web') }}
                        </div>
                        <x-dropdown-link href="{{ route('dashboard') }}">
                            {{ __('Dashboard Admin') }}
                        </x-dropdown-link>
                    @endif
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>

                    <x-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <div class="border-t border-gray-200"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        @else
            <a class="btn" href="/login">Login</a>
        @endif
    </div>
</div>
<script>
    // window.addEventListener('scroll', function() {
    //     var navbar = document.getElementById('navbar');
    //     if (window.scrollY > 0) {
    //         navbar.classList.add('fixed', 'top-0');
    //     } else {
    //         navbar.classList.remove('fixed', 'top-0');   
    //     }
    // });
</script>
