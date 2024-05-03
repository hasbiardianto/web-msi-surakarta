<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Preview {{ $post->title }}
        </h2>
    </x-slot>
    <div class="bg-white">
        <div class="text-sm breadcrumbs max-w-7xl mx-auto lg:px-8 sm:px-6">
            <ul>
                <li><a href="{{ route('dashboard') }}" wire:navigate>Dashboard</a></li>
                <li><a href="{{ route('dashboard.berita') }}" wire:navigate>Berita</a></li>
                <li><a href="{{ route('berita.list') }}" wire:navigate>List Berita</a></li>
                <li>{{ $post->title }}</li>
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
                    <article class="max-w-2xl mx-auto">
                        <h1 class="font-bold text-3xl mb-4">{{ $post->title }}</h1>
                        <span class="text-xs">Dibuat oleh : {{ $post->user->name }}</span><br>
                        <span class="text-xs">Dibuat Tanggal : {{ $post->created_at->toFormattedDateString() }}</span>
                        <img src="{{ asset('storage/posts/' . $post->image) }}" alt="Post Image" class="my-8">
                        <div class="trix-content mb-8">
                            <div
                                class="prose-h1:font-bold prose-h1:text-6xl prose-ol:list-decimal prose-ul:list-disc prose-a:text-blue-500 prose-a:underline prose-p:my-4">
                                {!! $post->body !!}
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
