@props(['title', 'description', 'keywords'])
<x-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="description">
        {{ $description }}
    </x-slot>
    <x-slot name="keywords">
        {{ $keywords }}
    </x-slot>

    <div class="relative  flex items-center   justify-start w-full h-screen  overflow-hidden">
        @include('components.custom.sheet-side')
        @include('components.custom.side-bar')

            <div
                class="w-full h-screen relative   overflow-x-hidden overflow-y-auto flex flex-col gap-4 justify-start items-center bg-slate-50 ">
                <nav
                class=" sticky lg:hidden top-0 left-0 w-full z-50 bg-white flex justify-between items-center p-4 border-b border-slate-400/35">
                <a class="text-primary font-semibold flex gap-0 items-center justify-start text-xl" href="{{ route('home') }}">
                    <svg class="w-8 h-8 text-primary"
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
                <div class="rounded-md flex md:hidden text-slate-500 border border-slate-400/35  p-1">
                    <svg x-data x-on:click="$dispatch('open-sheet')" class="" aria-label='open-menu'
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

                </nav>
                <div class="w-full flex mt-5 flex-col gap-4  md:mt-0 max-w-[95%] p-4  justify-start items-start">
                    {{ $slot }}
                </div>
            </div>
    </div>
</x-layout>
