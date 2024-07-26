<x-layout>
    <x-slot name="title">Dashboard Page</x-slot>
    <x-slot name="description">Dashboard Page</x-slot>
    <x-slot name="keywords">Dashboard Page</x-slot>

    <div class="relative flex items-center bg-neutral-50  justify-start w-full h-screen gap-2 overflow-hidden">
        <aside class=" w-96 left-0 top-0 h-screen sticky flex flex-col gap-4 justify-start items-center px-3 py-6">

        </aside>
        <div
            class="w-full h-screen mt-4 border  border-neutral-400/35 rounded-l-md overflow-x-hidden overflow-y-auto flex flex-col gap-4 justify-start items-center bg-white ">
            <div class="w-full  border-neutral-400/35 p-4 border-b flex  justify-between items-center">
                <div class="w-[25rem]">
                    <x-input class="  " name="" placeholder="Search for eny thing..." type="text" />
                </div>
                <x-user-avatar></x-user-avatar>
            </div>
            <div class="w-full flex flex-col mt-10 p-4  justify-start items-start">
              
                <livewire:create-category>
            </div>
        </div>
    </div>
</x-layout>
