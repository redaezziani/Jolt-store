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
