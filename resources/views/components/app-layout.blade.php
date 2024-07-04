<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-smooth scroll-smooth antialiased bg-white">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') ?? 'Smart HR' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css'])
</head>

<body class="antialiased flex h-full flex-col">
    <!--Nav bar Section -->
    <x-nav />

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer Section -->
    <x-footer />
</body>

</html>
