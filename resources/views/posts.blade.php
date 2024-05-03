<x-guest-layout>
    <section>
        <div class="flex justify-center py-8">
            <h1 class="font-bold text-3xl mt-4 text-slate-800">Berita dan Kegiatan</h1>
        </div>
        <div class="flex flex-col flex-wrap justify-center md:gap-8 gap-4 mb-4">
            @if ($posts->isEmpty())
            <figure class="size-96 mx-auto">
                <img src="{{ asset('img/no-content.jpg') }}" alt="no content">
            </figure>
            <span class="text-xl font-bold text-center">Belum ada postingan</span>
            @else
                @if ($posts->onFirstPage())
                    <div class="bg-gradient-to-r from-indigo-800 to-blue-500 w-full">
                        <h2 class="font-bold text-xl text-center text-white mt-8">Postingan Terbaru</h2>
                        <div class="mx-auto max-w-5xl my-8 pb-8 px-4">
                            <div
                                class="md:card md:card-side flex flex-col bg-base-100 shadow-xl rounded-none md:max-h-[250px]">
                                <figure class="md:max-w-md">
                                    <img src="{{ asset('storage/posts/' . $latest->image) }}" alt="Gambar Postingan"
                                        class="hover:scale-110 transition ease-in-out object-cover" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title">{{ $latest->title }}</h2>
                                    <span class="text-xs bg-slate-100 px-2 py-[2px] rounded w-[180px]">Dibuat Tanggal :
                                        {{ $latest->created_at->toFormattedDateString() }}</span>
                                    <p>{{ strip_tags(Str::limit($latest->body, 150)) }}</p>
                                    <div class="card-actions justify-end">
                                        <a href="{{ route('post', $latest->slug) }}">
                                            <button class="btn btn-primary hover:scale-95 transition ease-in-out">Lihat
                                                Lengkap</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="mx-auto max-w-5xl my-8 pb-8 px-4 w-full">
                    @foreach ($posts as $post)
                        <div
                            class="md:card md:card-side flex flex-col bg-base-100 shadow-xl rounded-none md:max-h-[250px]">
                            <figure class="max-w-md">
                                <img src="{{ asset('storage/posts/' . $post->image) }}" alt="Gambar Postingan"
                                    class="hover:scale-110 transition ease-in-out min-h-full" />
                            </figure>
                            <div class="card-body">
                                <h2 class="card-title">{{ $post->title }}</h2>
                                <span class="text-xs bg-slate-100 px-2 py-[2px] rounded w-fit">Dibuat Tanggal :
                                    {{ $post->created_at->toFormattedDateString() }}</span>
                                <p>{{ strip_tags(Str::limit($post->body, 150)) }}</p>
                                <div class="card-actions justify-end">
                                    <a href="{{ route('post', $post->slug) }}">
                                        <button class="btn btn-primary hover:scale-95 transition ease-in-out">Lihat
                                            Lengkap</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            {{ $posts->links() }}
        </div>
    </section>
</x-guest-layout>
