<div
    wire:poll.keep-alive
    x-data="{ open: false }"
    x-on:keydown.escape="open = false"
    x-on:keydown.tab="open = false"
    x-on:keydown.shift.tab="open = false"
    x-on:color-side-bar-open.window="open = true"
    x-on:color-side-bar-close.window="open = false"
    x-on:click.outside="open = false"
    x-show="open"
    class="w-full z-[999] overflow-hidden h-screen backdrop-blur-sm bg-black/10 fixed left-0 top-0"
>
    <div x-on:click="open = false" class="w-full z-[1] overflow-hidden h-screen backdrop-blur-sm bg-black/20"></div>

    <aside
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform -translate-x-full"
        x-transition:enter-end="transform translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="transform translate-x-0"
        x-transition:leave-end="transform -translate-x-full"
        class="w-96 z-10 absolute left-0 top-0 h-screen flex bg-white flex-col gap-4 justify-start items-start p-4"
    >
        <div class="w-full flex justify-between items-center">
            <p class="text-2xl font-semibold text-neutral-800">
                اختر لون المنتج الخاص بك
            </p>

            <button x-on:click="open = false" class="text-neutral-800 p-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Color Picker Input -->
       
    </aside>
</div>
