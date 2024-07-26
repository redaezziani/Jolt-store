<div class="w-full flex gap-3 justify-end items-center ">
    <div class=" relative w-[20rem] flex justify-start items-center">
        <x-input wire:model.live="search" type='text'
         placeholder="Saerch for eny thing..."
         class=" w-full" />
        <div class="size-8 bg-white flex justify-center items-center text-slate-500 absolute right-1 ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none">
                <path d="M17.5 17.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path
                    d="M20 11C20 6.02944 15.9706 2 11 2C6.02944 2 2 6.02944 2 11C2 15.9706 6.02944 20 11 20C15.9706 20 20 15.9706 20 11Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
            </svg>
        </div>
    </div>

    <a href="{{ route('dashboard-products-create') }}">
        <x-button class="default flex items-center justify-center gap-1 px-4 py-2">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M9 12h6" /><path d="M12 9v6" /></svg>
            <p>
                Create Product
            </p>
        </x-button>

        </a >
        <div
        wire:ignore
        class="flex">
        </div>
</div>
