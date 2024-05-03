<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/img/logo-msi.png" type="image/x-icon">
    <title>{{ config('app.title') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script>
        document.documentElement.classList.add('js')

        function onSubmit(token) {
            document.getElementById('contactForm').submit();
        }
        
    </script>


    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <x-navbar />
    <div class="font-sans text-gray-900 antialiased min-h-screen">
        {{ $slot }}
    </div>
    <x-footer />
    @livewireScripts
    <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
</body>

</html>
