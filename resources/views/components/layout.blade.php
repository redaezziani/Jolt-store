<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ $description }}" />
    <meta name="keywords" content="{{ $keywords }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>{{ $title ?? 'My App' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" />
    <!-- Styles -->
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="relative flex flex-col items-center justify-start w-full min-h-screen gap-3 overflow-x-hidden">
    {{ $slot }}

    <!-- Scripts -->
    @vite('resources/js/app.js')
    @livewireScripts
</body>

</html>
