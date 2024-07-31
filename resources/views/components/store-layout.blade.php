@props(['title', 'description', 'keywords'])

<x-layout>
    @include('components.notification-toaster')
    <livewire:cart-side-bar>
    <livewire:search-products>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="description">
        {{ $description }}
    </x-slot>
    <x-slot name="keywords">
        {{ $keywords }}
    </x-slot>
    <header class=" w-full z-50 max-w-full bg-white/15 border-b border-teal-700/35 flex flex-col gap-0 justify-start items-center fixed top-0 left-0">
        <span id="wrapper" class=" w-full justify-center flex h-8 bg-teal-600 items-center overflow-hidden relative">
            <h1 class=" text-neutral-800   text-sm font-bold capitalize">
                The new Collection in our store is all with a <span
                    class=" text-white bg-primary rounded-full px-3 py-0.5">60% off</span>
            </h1>
        </span>
        <nav
        id="nav-bar"
        class=" w-full backdrop-blur-sm  border-neutral-400/35 flex justify-between md:max-w-[85%] items-center py-2 px-6">
            <div class="flex gap-x-4 justify-end items-end">
                <a class=" text-teal-800 font-bold text-3xl" href={{ route('home') }}
                >
                    Jolt
                </a>
                <ul class=" ml-8 hidden md:flex justify-center gap-x-4 items-center">
                    <a
                    href="#"
                        class="text-sm font-semibold text-neutral-800 ">Home</a>
                    <a
                    href="#"
                        class="text-sm font-semibold text-neutral-800 ">Best</a>
                    <a
                    href="#"
                        class="text-sm font-semibold text-neutral-800 ">Category</a>
                    <a
                    href="#"
                        class="text-sm font-semibold text-neutral-800 ">Sold</a>
                </ul>
            </div>


            <div class="flex gap-x-4 justify-center items-center" id="">
                <div
                   x-data
                     x-on:click="$dispatch('search-side-bar-open')"
                    class="text-sm font-semibold flex  gap-x-2 justify-start items-center text-neutral-800 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M21 21l-6 -6" />
                    </svg>
                    <p>
                        Search
                    </p>
                </div>

                <div
                    class="text-sm font-semibold flex  gap-x-2 justify-start items-center text-neutral-800 ">
                   <livewire:bag-cart />
                    <a
                    href="{{ route('login') }}"
                        class="text-sm font-semibold flex ml-6  gap-x-2 justify-start items-center text-neutral-800 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                        </svg>
                        <p>
                            Login
                        </p>
                    </a>
                </div>
                <svg class=" flex md:hidden" aria-label='open-menu' xmlns='http://www.w3.org/2000/svg'
                    viewBox='0 0 24 24' width="20" height="20" fill='none'>
                    <path d='M4 5L20 5' stroke='currentColor' stroke-width='1.5' stroke-linecap='round'
                        stroke-linejoin='round' />
                    <path d='M4 12L20 12' stroke='currentColor' stroke-width='1.5' stroke-linecap='round'
                        stroke-linejoin='round' />
                    <path d='M4 19L20 19' stroke='currentColor' stroke-width='1.5' stroke-inecap='round'
                        stroke-inejoin='round' />
                </svg>
            </div>
        </nav>
    </header>
    {{--rednder slots--}}
    {{ $slot }}
</x-layout>
