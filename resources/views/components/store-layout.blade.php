@props(['title', 'description', 'keywords'])

<x-layout>
    @include('components.notification-toaster')
    @include('components.nav-sheet')
        <livewire:cart-side-bar  />
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
            <header
             id="header"
                class=" w-full z-50 max-w-full bg-primary   flex flex-col gap-0 justify-start items-center fixed top-0 left-0">
                <div class=" w-full bg-white px-4 py-3 text-primary">
                    <p class="text-center text-sm font-medium">
                        {{ __('free_shipping') }}
                      <a href="#" class="inline-block px-2 underline">
                        {{ __('learn_more') }}
                      </a>
                    </p>
                  </div>
                <nav id="nav-bar"
                    class=" w-full     flex justify-between md:max-w-[100%] lg:max-w-[78%] items-center py-2 px-3">
                    <div class="flex gap-x-4 justify-end items-end">
                        <a class=" text-white font-bold flex gap-0 items-center justify-start text-3xl"
                            href={{ route('home') }}>
                            جولت
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


                            <a href="#"
                                class="text-sm font-semibold text-slate-50 {{ Route::currentRouteName() == 'sold' ? 'active' : '' }}">
                                {{ __('about_us') }}
                            </a>

                            <a href="#"
                                class="text-sm font-semibold text-slate-50 {{ Route::currentRouteName() == 'sold' ? 'active' : '' }}">
                                {{ __('contact_us') }}
                            </a>
                        </ul>

                    </div>


                    <div class="flex gap-x-4 justify-center items-center" id="">
                        <div x-data x-on:click="$dispatch('search-side-bar-open')"
                            class="text-sm font-semibold flex cursor-pointer  gap-x-2 justify-start items-center text-slate-50 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M21 21l-6 -6" />
                            </svg>
                            <p>
                                {{ __('search') }}
                            </p>
                            </svg>

                        </div>
                        <div
                        x-data="{
                            open: false,
                            toggle() {
                                if (this.open) {
                                    return this.close()
                                }

                                this.$refs.button.focus()

                                this.open = true
                            },
                            close(focusAfter) {
                                if (! this.open) return

                                this.open = false

                                focusAfter && focusAfter.focus()
                            }
                        }"
                        x-on:keydown.escape.prevent.stop="close($refs.button)"
                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                        x-id="['dropdown-button']"
                        class="relative"
                    >
                        <!-- Button -->
                        <button
                            x-ref="button"
                            x-on:click="toggle()"
                            :aria-expanded="open"
                            :aria-controls="$id('dropdown-button')"
                            type="button"
                            class="flex items-center gap-2 bg-none px-5 py-2.5 text-white"
                        >
                            Language

                            <!-- Heroicon: chevron-down -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Panel -->
                        <div
                            x-ref="panel"
                            x-show="open"
                            x-transition.origin.top.left
                            x-on:click.outside="close($refs.button)"
                            :id="$id('dropdown-button')"
                            style="display: none;"
                            class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md"
                        >
                            <a href="{{ route('switchLanguage', 'en') }}" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50">
                                English
                            </a>

                            <a href="{{ route('switchLanguage', 'ar') }}" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50">
                                العربية
                            </a>
                        </div>
                    </div>

                        <div
                            class="text-sm font-semibold hidden sm:flex  gap-x-2 justify-start items-center text-slate-50 ">
                            <livewire:bag-cart />
                            <a href="{{ route('login') }}"
                                class="text-sm font-semibold flex ml-6  gap-x-2 justify-start items-center text-slate-50 ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24" fill="none">
                                    <path
                                        d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </a>
                        </div>
                        <div class=" rounded-md  flex md:hidden text-white p-1">
                            <svg x-data x-on:click="$dispatch('nav-sheet-open')" class=" " aria-label='open-menu'
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
            {{-- rednder slots --}}
            {{ $slot }}

            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.data('languageSwitcher', () => ({
                        open: false,
                        lang: '{{ app()->getLocale() }}'
                    }));
                });
            </script>

</x-layout>
