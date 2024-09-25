@props(['title', 'description', 'keywords'])

<x-layout>
    @include('components.nav-sheet')
    <livewire:cart-side-bar wire:poll.5000ms />
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

        <header id="header"
            class="w-full z-50 max-w-full bg-primary flex flex-col gap-0 justify-start items-center fixed top-0 left-0">
            <div class="w-full bg-white px-4 py-3 text-primary">
                <p class="text-center text-sm font-medium">
                    {{ __('free_shipping') }}
                    <a href="#" class="inline-block px-2 underline">
                        {{ __('learn_more') }}
                    </a>
                </p>
            </div>
            <nav id="nav-bar"
                class="w-full flex justify-between md:max-w-[100%] lg:max-w-[78%] items-center py-2 px-3">
                <div class="flex gap-x-4 justify-end items-end">
                    <a class="text-white font-semibold flex gap-0 items-center justify-start text-xl" href="{{ route('home') }}">
                        <svg class="w-8 h-8 text-slate-50"
                             version="1.1"
                             id="Layer_1"
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"
                             x="0px"
                             y="0px"
                             viewBox="-279 370.5 52.5 52.5"
                             fill="currentColor"
                             xml:space="preserve"
                             width="52.5"
                             height="52.5"
                             >
                            <g>
                                <path d="M-252.7,371.2c-14.1,0-25.5,11.4-25.5,25.5c0,14,11.5,25.5,25.5,25.5c14.1,0,25.5-11.4,25.5-25.5
                                  C-227.2,382.7-238.7,371.2-252.7,371.2L-252.7,371.2z M-268.3,381.2c4.1-4.1,9.7-6.4,15.5-6.4s11.4,2.3,15.5,6.4
                                  c4.1,4.1,6.4,9.7,6.4,15.5c0,3.1-0.6,6.1-1.9,8.9c-0.6,1.4-2.6,1.6-3.4,0.3l-0.9-1.4c-0.9-1.4-2.4-2.2-4-2.2l0,0
                                  c-1.6,0-3.2,0.8-4,2.2l-0.7,1.2c-0.4,0.6-1,1-1.8,1c-0.7,0-1.4-0.4-1.8-1l-9.5-15.1c-0.7-1.1-1.9-1.8-3.3-1.8h0
                                  c-1.3,0-2.6,0.7-3.3,1.8l-6.6,10.6c-0.6,1-2.2,0.7-2.4-0.5c-0.2-1.3-0.3-2.5-0.3-3.8C-274.7,390.9-272.4,385.3-268.3,381.2
                                  L-268.3,381.2z" />
                                <path d="M-240.9,399.9c2.9,0,5.3-2.4,5.3-5.3c0-2.9-2.4-5.3-5.3-5.3s-5.3,2.4-5.3,5.3C-246.2,397.5-243.8,399.9-240.9,399.9z" />
                            </g>
                        </svg>
                        <span class="mr-2">{{ env('APP_NAME', 'Default App Name') }}</span> <!-- Display app name -->
                    </a>

                    <ul class="ml-8 hidden md:flex justify-center gap-x-4 items-center">
                        <a href="{{ route('products-index') }}"
                            class="text-sm font-semibold text-slate-50 {{ Route::currentRouteName() == 'products-index' ? 'text-white' : '' }}">
                            {{ __('products') }}
                        </a>
                        <a href="#"
                            class="text-sm font-semibold text-slate-50 {{ Route::currentRouteName() == 'best' ? 'active' : '' }}">
                            {{ __('best') }}
                        </a>
                        <a href="#"
                            class="text-sm font-semibold text-slate-50 {{ Route::currentRouteName() == 'category' ? 'active' : '' }}">
                            {{ __('category') }}
                        </a>
                        <a href="{{ route('about') }}"
                            class="text-sm font-semibold text-slate-50 {{ Route::currentRouteName() == 'sold' ? 'active' : '' }}">
                            {{ __('about_us') }}
                        </a>
                        <a href="{{ route('contact') }}"
                            class="text-sm font-semibold text-slate-50 {{ Route::currentRouteName() == 'sold' ? 'active' : '' }}">
                            {{ __('contact_us') }}
                        </a>
                    </ul>
                </div>
                <div class="flex gap-x-4 justify-center items-center" id="">

                    <div x-data x-on:click="$dispatch('search-side-bar-open')"
                        class="text-sm font-semibold flex cursor-pointer gap-x-2 justify-start items-center text-slate-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M21 21l-6 -6" />
                        </svg>
                        <p>{{ __('search') }}</p>
                    </div>
                    <div class="text-sm font-semibold hidden sm:flex gap-x-2 justify-start items-center text-slate-50">
                        <livewire:bag-cart />
                        @auth
                            <div class="flex justify-start gap-x-2 items-center">
                                <a class="text-sm font-semibold flex gap-x-2 justify-start items-center text-slate-50">
                                    <p>{{ auth()->user()->name }}</p>
                                </a>
                                @if (auth()->user()->role == 'admin')
                                    <a class="text-sm font-semibold flex gap-x-2 justify-start items-center text-slate-50"
                                        href="{{ route('dashboard-index') }}">
                                        <p>{{ __('dashboard') }}</p>
                                    </a>
                                @endif
                            </div>
                        @endauth
                        @guest
                            <a href="{{ route('login') }}"
                                class="text-sm font-semibold flex ml-6 gap-x-2 justify-start items-center text-slate-50">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                    fill="none">
                                    <path
                                        d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </a>
                        @endguest
                    </div>
                    <div class="rounded-md flex md:hidden text-white p-1">
                        <svg x-data x-on:click="$dispatch('nav-sheet-open')" class="" aria-label='open-menu'
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            fill="none">
                            <path d="M4 5L14 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M4 12L20 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M4 19L20 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </nav>
        </header>
        {{ $slot }}
    </livewire:search-products>
</x-layout>
