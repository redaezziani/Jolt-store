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
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-BTVpG8X0.css ') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/app-CCJSjwJX.css') }}" /> <!-- If you have a lib.css built --> --}}
    <script src="{{ asset('build/assets/app-CCJSjwJX.js') }}" defer></script>
    @vite('resources/css/app.css')
    @vite('resources/css/lib.css')
    @vite('resources/js/app.js')
    @livewireStyles
    <wireui:scripts />
    @trixassets
</head>

<body class="relative flex flex-col  items-center justify-start w-full min-h-screen gap-3 overflow-x-hidden" >
    <x-notifications z-index="z-[999]" />

    {{ $slot }}
    <!-- Scripts -->
    @livewireScripts
</body>
</html>
