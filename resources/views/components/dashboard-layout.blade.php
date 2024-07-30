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

    <div class="relative flex items-center bg-teal-800    justify-start w-full h-screen gap-2 overflow-hidden">
        @include('components.custom.sheet-side')
        @include('components.custom.side-bar')
        <div
            class="w-full h-screen relative md:mt-4 border  border-neutral-400/35 md:rounded-l-md overflow-x-hidden overflow-y-auto flex flex-col gap-4 justify-start items-center bg-white ">
            @include('components.custom.toast')
            <div
                class="w-full sticky bg-white top-0 left-0  border-neutral-400/35 p-4 border-b flex  justify-between items-center">
                <div class=" w-52  md:w-[25rem]">
                    <x-input class="  " name="" placeholder="Search for eny thing..." type="text" />
                </div>
                <div class="flex gap-x-2 items-center justify-center">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.4"  stroke-linecap="round"  stroke-linejoin="round"  class="icon text-neutral-400  icon-tabler icons-tabler-outline icon-tabler-bell"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                    <livewire:user-avatar>
                    <x-button x-data x-on:click="$dispatch('open-sheet')"
                        class=" flex md:hidden outline h-9 w-9 px-0 py-0 p-0 text-slate-800">
                        <svg aria-label='open-menu' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'
                            width="20" height="20" fill='none'>
                            <path d='M4 5L20 5' stroke='currentColor' stroke-width='1.5' stroke-linecap='round'
                                stroke-linejoin='round' />
                            <path d='M4 12L20 12' stroke='currentColor' stroke-width='1.5' stroke-linecap='round'
                                stroke-linejoin='round' />
                            <path d='M4 19L20 19' stroke='currentColor' stroke-width='1.5' stroke-inecap='round'
                                stroke-inejoin='round' />
                        </svg>
                    </x-button>
                </div>

            </div>


            <div class="w-full flex mt-5 flex-col gap-4  md:mt-10 p-4  justify-start items-start">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layout>
