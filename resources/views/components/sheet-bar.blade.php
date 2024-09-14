<div x-data="{ open: false }" x-on:keydown.escape="open = false" x-on:keydown.tab="open = false"
    x-on:keydown.shift.tab="open = false" x-on:dashboard-sheet-bar-open.window="open = true"
    x-on:dashboard-sheet-bar-close.window="open = false" x-on:click.outside="open = false" x-show="open" style="display: none"
    class="w-full z-[999] overflow-hidden h-screen  fixed left-0 top-0">

    <aside x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform translate-y-full" x-transition:enter-end="transform -translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform -translate-y-0"
        x-transition:leave-end="transform translate-y-full"
        class="w-full h-screen z-10 absolute left-0 bottom-0   flex bg-white flex-col gap-4 justify-start items-center p-4">
        <div class="flex md:max-w-[100%] lg:max-w-[95%] p-2 overflow-y-auto  flex-col gap-2 justify-start w-full items-center">

            <div class="w-full flex justify-between items-center">
                <p class=" text-primary font-bold flex gap-0 items-center justify-start text-3xl">
                    جولت
                </p>
                <span x-on:click="open = false" class="text-slate-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M18 6l-12 12" />
                        <path d="M6 6l12 12" />
                    </svg>
                </span>
            </div>
            {{ $slot }}
        </div>

    </aside>
</div>
