<x-guest-layout>
    <div class="hero md:min-h-screen" style="background-image: url(/img/hero-index.jpg);">
        <div class="hero-overlay bg-gradient-to-b from-slate-600"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-2xl py-8">
                <h1 class="mb-5 md:text-5xl text-3xl font-bold">{{ config('app.title') }}</h1>
                <p class="my-5 text-sm md:text-base">Segeralah Shalat agar hatimu tenang, Istighfarlah agar kecewamu
                    hilang. Dan Berdoalah
                    agar bahagiamu segera datang</p>
                <button class="btn btn-primary"><a href="{{ route('about') }}">Tentang Kami</a></button>
            </div>
        </div>
    </div>
    @if ($posts->isEmpty())
    @else
        <section class="min-h-screen flex flex-col justify-center">
            <div class="p-2 my-4">
                <h2 class="text-xl md:text-3xl text-center font-semibold">Berita dan Kegiatan</h2>
            </div>
            <div class="flex flex-col md:flex-row gap-4 justify-center my-8">
                @foreach ($posts as $post)
                    <div class="card card-compact w-auto md:w-96 shadow-xl px-4">
                        <figure class='max-h-[150px]'>
                            <img src="{{ asset('storage/posts/' . $post->image) }}" alt="Gambar Postingan"
                                class="w-full" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p>{{ strip_tags(Str::limit($post->body, 50)) }}</p>
                            <div class="card-actions justify-end">
                                <a href='{{ route('post', $post->slug) }}'>
                                    <button class="btn btn-primary hover:scale-95 transition easy-in-out">lihat
                                        lengkap</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="p-2 my-8 mx-4">
                <div class="flex justify-center">
                    <a href="{{ route('posts') }}"
                        class="flex gap-2 hover:translate-x-2 hover:underline transition ease-in-out">
                        Lihat semua berita
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    @endif
    <section class="bg-[url('/public/img/section-about.jpg')] hero md:min-h-screen">
        <div class="hero-overlay bg-gradient-to-r from-slate-600"></div>
        <div class="py-4 px-8">
            <h2 class="md:text-5xl text-3xl font-bold my-4 text-white">Visi Misi Mentari Sehat Indonesia</h2>
            <p class="md:text-xl font-semibold text-slate-100 mb-8">Visi yayasan Mentari Sehat Indonesia adalah
                penggerak
                terwujudnya
                infrastruktur kesehatan non pemerintah dan dinamika kelompok sosial yang mampu secara mandiri
                menanggulangi masalah kesehatan, sosial, dan pendidikan di masyarakat.</p>
            <a href="{{ route('contact') }}">
                <button class="btn" class="my-8">Hubungi Kami</button>
            </a>
    </section>
</x-guest-layout>
