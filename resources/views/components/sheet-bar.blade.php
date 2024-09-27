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
                <a
                class="text-slate-700 font-semibold flex gap-0 items-center justify-start text-xl"
                 href="{{ route('home') }}">
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
            <div class="mt-5 w-full">
                {{ $slot }}
            </div>
        </div>

    </aside>
</div>
