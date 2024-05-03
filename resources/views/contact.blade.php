<x-guest-layout>
    <section class="flex flex-col px-4 my-4 md:max-w-4xl mx-auto">
        <div class="flex justify-center p-2">
            <h1 class="font-bold text-3xl mt-4">Hubungi Kami</h1>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success text-white mb-4 animate-fade-down animate-duration-500 animate-once rounded">
                {{ session()->get('message') }}
            </div>
        @endif
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

        <form id="contactForm" method="post" action="{{ route('contact.send') }}">
            @csrf
            <div class="p-4 rounded-md border shadow-lg">
                <!-- Name input -->
                <div class="mb-3">
                    <label class="label" for="name">Nama Lengkap</label>
                    <input type="text" class="input input-bordered w-full" id="name" type="text"
                        name="name" placeholder="Name" />
                </div>

                <!-- Email address input -->
                <div class="mb-3">
                    <label class="label" for="email">Alamat Email</label>
                    <input class="input input-bordered w-full" id="email" type="email" name="email"
                        placeholder="Email Address" />
                </div>

                <!-- Message input -->
                <div class="mb-3">
                    <label class="label" for="message">Pesan</label>
                    <textarea class="textarea textarea-bordered w-full h-36" id="message" type="text" name="message"
                        placeholder="Message"></textarea>
                </div>

                <!-- Form submit button, including reCAPTCHA V3 attributes -->
                <div class="grid justify-end">
                    <button class="g-recaptcha btn btn-primary" {{-- data-sitekey="{{ config('services.recaptcha_v3.siteKey') }}" data-callback="onSubmit"
                        data-action="submitContact"> --}}>
                        Kirim
                    </button>

                </div>
            </div>
        </form>
    </section>
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
    </script>
</x-guest-layout>
