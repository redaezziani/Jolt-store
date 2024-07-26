<x-layout>
    <x-slot name="title">Home Page</x-slot>
    <x-slot name="description">Home Page</x-slot>
    <x-slot name="keywords">Home Page</x-slot>
    <header class=" w-full z-50 backdrop-blur-sm max-w-full flex flex-col gap-4 justify-start items-center fixed top-0 left-0">
        <span id="wrapper" class=" w-full justify-center flex h-8 bg-primary items-center overflow-hidden relative">
            <h1 class="  text-white text-sm font-bold capitalize">
                The new Collection in our store is all with a 60% off
            </h1>
        </span>
        <nav class=" w-full flex justify-between md:max-w-[70%] items-center py-3 px-6">
            <a href="#">
                <h1 class=" text-lg font-bold text-primary">
                    Store
                </h1>
            </a>
            <ul class=" hidden md:flex justify-center gap-x-4 items-center">
                <a href="#" class="text-sm hover:text-slate-600/95 cursor-pointer text-slate-600">Home</a>
                <a href="#" class="text-sm hover:text-slate-600/95 cursor-pointer text-slate-600">Best</a>
                <a href="#" class="text-sm hover:text-slate-600/95 cursor-pointer text-slate-600">Category</a>
                <a href="#" class="text-sm hover:text-slate-600/95 cursor-pointer text-slate-600">Sold</a>
            </ul>
            <div class="flex gap-x-4 justify-center items-center" id="">
                <x-button class="outline">
                    sign-in
                </x-button>
                <x-button class="default">
                    sign-up
                </x-button>

                <svg
                class=" flex md:hidden"
                aria-label='open-menu' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width="20"
                    height="20" fill='none'>
                    <path d='M4 5L20 5' stroke='currentColor' stroke-width='1.5' stroke-linecap='round'
                        stroke-linejoin='round' />
                    <path d='M4 12L20 12' stroke='currentColor' stroke-width='1.5' stroke-linecap='round'
                        stroke-linejoin='round' />
                    <path d='M4 19L20 19' stroke='currentColor' stroke-width='1.5' stroke-inecap='round'
                        stroke-inejoin='round' />
                </svg>
            </div>
        </nav>
    </header>
    <div class="relative flex items-center flex-col justify-start w-full min-h-screen gap-2 overflow-hidden">
        <section class="mt-32 md:max-w-[70%] px-6  grid grid-cols-1 md:grid-cols-3 w-full gap-2">
            <div class="w-full col-span-2 aspect-video p-2 bg-slate-50 rounded-md border border-slate-400/35 max-h-96">

            </div>
            <div class=" flex flex-col gap-3 max-h-96 overflow-hidden">
                <div class="w-full col-span-1 max-h-1/2 aspect-video p-2 bg-slate-50 rounded-md border border-slate-400/35 max-h-70">

                </div>

                <div class="w-full col-span-1 max-h-1/2 aspect-video p-2 bg-slate-50 rounded-md border border-slate-400/35 max-h-70">

                </div>
            </div>
        </section>
        <section class="md:max-w-[70%] min-h-72 px-6 flex w-full justify-start items-start gap-4 flex-col" >
            <h3
            class=" text-lg font-semibold"
            >
                All categories
            </h3>
        </section>

        <section class="md:max-w-[70%] px-6 flex w-full justify-start items-start gap-4 flex-col" >
            <h3
            class=" text-lg font-semibold"
            >
                    Best Products
            </h3>
            <div class="w-full grid gap-4 grid-cols-2 sm:grid-cols-3 md:grid-cols-5 ">
                <div class="w-full flex  overflow-hidden flex-col justify-start items-center relative col-span-1">
                    <div class="w-full border border-neutral-400/30 h-auto aspect-square ">

                    </div>
                    <div class="flex-flex-col w-full  gap-2 justify-start items-start">
                        <h4>
                                Product name
                        </h1>
                        <p>
                            Product desc
                        </p>

                    </div>
                </div>
            </div>
        </section>

    </div>
</x-layout>
