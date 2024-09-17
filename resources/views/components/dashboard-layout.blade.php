@props(['title', 'description', 'keywords'])
<x-layout

>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="description">
        {{ $description }}
    </x-slot>
    <x-slot name="keywords">
        {{ $keywords }}
    </x-slot>

    <div class="relative flex items-center bg-white  justify-start w-full h-screen gap-2 overflow-hidden">
        @include('components.custom.sheet-side')
        @include('components.custom.side-bar')
    <livewire:make-category>

        <div
            class="w-full h-screen relative  border  border-slate-400/35  overflow-x-hidden overflow-y-auto flex flex-col gap-4 justify-start items-center bg-white ">
            <div
                class="w-full sticky bg-white top-0 left-0  border-slate-400/35 p-2 border-b flex  justify-between items-center">
                <div class=" w-52  md:w-[25rem]">
                </div>
                <div class="flex gap-x-2 items-center justify-center">

                    <livewire:user-avatar>

                    <svg  x-data x-on:click="$dispatch('open-sheet')" class="flex md:hidden size-6 px-0 py-0 p-0 text-slate-800" aria-label='open-menu'
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


            <div class="w-full flex mt-5 flex-col gap-4  md:mt-10 max-w-[95%] p-4  justify-start items-start">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layout>
