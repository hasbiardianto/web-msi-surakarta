<x-guest-layout>
    <div class="bg-slate-100 mx-auto breadcrumbs py-4 px-8">
        <ul>
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('posts') }}">Berita</a></li>
            <li>{{ $post->title }}</li>
        </ul>
    </div>
    <div class="flex lg:flex-row flex-col">
        <article class="max-w-2xl mx-auto px-8">
            <h1 class="font-bold text-3xl mt-8 mb-4">{{ $post->title }}</h1>
            <span class="text-xs">Dibuat Tanggal : {{ $post->created_at->toFormattedDateString() }}</span>
            <img src="{{ asset('storage/posts/' . $post->image) }}" alt="Post Image" class="my-8">
            <div class="trix-content mb-8">
                <div
                    class="prose-h1:font-bold prose-h1:text-6xl prose-ol:list-decimal prose-ul:list-disc prose-a:text-blue-500 prose-a:underline prose-p:my-4">
                    {!! $post->body !!}
                </div>
            </div>
        </article>
        @if ($next === null)
            <aside>

            </aside>
        @else
            <aside class="lg:w-80">
                <section class="px-2 my-8 shadow sticky top-28 mx-4">
                    <h2 class="text-center font-semibold text-md py-4">Berita Lainnya</h2>
                    <figure class="max-w-md">
                        <img src="{{ asset('storage/posts/' . $next->image) }}" alt="Post Image" class="w-full">
                    </figure>
                    <div class="my-4">
                        <h3 class="font-semibold text-xl p-2">{{ $next->title }}</h3>
                        <span class="mx-2 text-xs bg-slate-100 px-2 py-[2px] rounded min-w-fit">Dibuat Tanggal :
                            {{ $post->created_at->toFormattedDateString() }}</span>
                    </div>
                    <a href="{{ route('post', $next->slug) }}">
                        <button
                            class="bg-indigo-600 text-white mx-2 mb-4 p-2 rounded text-sm hover:scale-105 active:scale-95 transition ease-in-out">
                            Lihat selengkapnya
                        </button>
                    </a>
                </section>
            </aside>
        @endif
    </div>
    </div>
</x-guest-layout>
