<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Berita dan Kegiatan') }}
        </h2>
    </x-slot>
    <div class="bg-white">
        <div class="text-sm breadcrumbs max-w-7xl mx-auto lg:px-8 sm:px-6">
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('dashboard.berita') }}">Berita</a></li>
                <li>Edit Postingan</li>
            </ul>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <ul class="flex flex-col gap-2 pb-3">
                    @foreach ($errors->all() as $error)
                        <li onclick="hiddenAlert(this)">
                            <div id="errorAlert"
                                class="animate-fade-down animate-duration-500 animate-once bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <span class="block sm:inline font-bold">{{ $error }}<span>
                                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                            <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <a>Close</a>
                                                <path
                                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                            </svg>
                                        </span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif


            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('berita.update', $post->id) }}" method="post" class="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-4 flex-col flex gap-4">
                            <div>
                                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                                <input type="text" name="title" id="title"
                                    class="shadow appearance-none border border-slate-200 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    value="{{ old('title', $post->title) }}">
                            </div>
                            <div>
                                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Gambar</label>
                                @if ($post->image)
                                    <img class="img-preview max-h-[300px] mb-2"
                                        src="{{ asset('storage/posts/' . $post->image) }}">
                                @else
                                    <img class="img-preview max-h-[300px] mb-2">
                                @endif
                                <input type="file" name="image" id="image"
                                    class="file-input file-input-bordered border-slate-200 w-full max-w-xs"
                                    value="{{ old('image', $post->image) }}" onchange="previewImage()"/>
                            </div>
                            <div
                                class="prose-h1:font-bold prose-h1:text-6xl prose-ol:list-decimal prose-ul:list-disc prose-a:text-blue-500 prose-a:underline prose-p:my-4">
                                <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Isi
                                    Berita</label>
                                <input id="body" type="hidden" name="body"
                                    value="{{ old('body', $post->body) }}">
                                <trix-editor input="body" class="trix-content"></trix-editor>
                            </div>
                            <div class="mb-4">
                            </div>
                            <div>
                                <x-button type="submit" class="bg-blue-600">Update Post</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                alert.addEventListener('click', function() {
                    alert.addClass('hidden')
                })

                function hiddenAlert(elem) {
                    var a = document.getElementsByTagName('li');
                    for (i = 0; i < a.length; i++) {
                        a[i].classList.remove('active')
                    }
                    elem.classList.add('hidden');
                }

                function previewImage() {
                    const image = document.querySelector('#image');
                    const imgPreview = document.querySelector('.img-preview');

                    imgPreview.style.display = 'block';

                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(image.files[0]);
                    oFReader.onload = function(oFREvent) {
                        imgPreview.src = oFREvent.target.result;
                    }
                }
            </script>
</x-app-layout>
