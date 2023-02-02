<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/datepicker.min.js"></script>

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased bg-lightBlack">
<div class="min-h-screen">
    <div class="relative font-sans antialiased bg-lightBlack">
        <x-header class="absolute"></x-header>

        <main class="w-full flex justify-center mt-5 text-white">
            <div class="container">{{ $slot }}</div>
        </main>
    </div>
</div>
@stack('modals')

@livewireScripts
</body>
</html>
