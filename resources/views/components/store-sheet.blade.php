<div
    x-data="{ open: false }"
    x-on:keydown.escape="open = false"
    x-on:keydown.tab="open = false"
    x-on:keydown.shift.tab="open = false"
    x-on:store-sheet-open.window="open = true"
    x-on:store-sheet-close.window="open = false"
    x-on:click.outside="open = false"
    x-show="open"
    style="display: none"
    class="w-full z-[999] overflow-hidden h-screen backdrop-blur-sm bg-black/10 fixed left-0 top-0"
>
    <div
        x-on:click="open = false"
        class="w-full z-[1] overflow-hidden h-screen backdrop-blur-sm bg-black/20"
    ></div>

    <aside
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform -translate-x-full"
        x-transition:enter-end="transform translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="transform translate-x-0"
        x-transition:leave-end="transform -translate-x-full"
        class="w-96 z-10 absolute left-0 top-0 h-screen flex bg-white flex-col gap-4 justify-start items-start p-4"
    ></aside>
</div>
