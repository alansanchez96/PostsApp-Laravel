<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PostsApp@Laravel</title>

    @vite(['src/Presentation/Laravel/assets/css/app.css', 'src/Presentation/Laravel/assets/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- Flowbite Tailwind --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

</head>

<body class="font-sans antialiased bg-gray-300">
    @livewire('navigation')

    <div class="min-h-screen">

        <main class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
