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
                class="w-full h-screen relative   overflow-x-hidden overflow-y-auto flex flex-col gap-4 justify-start items-center bg-slate-100 ">



                <div class="w-full flex mt-5 flex-col gap-4  md:mt-10 max-w-[95%] p-4  justify-start items-start">
                    {{ $slot }}
                </div>
            </div>
    </div>
</x-layout>
