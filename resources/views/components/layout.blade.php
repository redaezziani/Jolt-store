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
    <script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.49.1/dist/apexcharts.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/apexcharts@3.49.1/dist/apexcharts.min.css" rel="stylesheet">
    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/css/lib.css')
    @livewireStyles
    @vite('resources/js/app.js')
    <wireui:scripts />
</head>

<body class="relative flex flex-col  items-center justify-start w-full min-h-screen gap-3 overflow-x-hidden">
    <x-notifications z-index="z-[999]" />
    {{ $slot }}
    <!-- Scripts -->
    @livewireScripts
</body>

</html>
