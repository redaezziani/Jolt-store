{{--

--}}
<div wire:poll.100ms x-data="{ open: false }" x-on:keydown.escape="open = false" x-on:keydown.tab="open = false"
    x-on:keydown.shift.tab="open = false" x-on:nav-sheet-open.window="open = true"
    x-on:nav-sheet-close.window="open = false" x-on:click.outside="open = false" x-show="open" style="display: none"
    class="w-full z-[999] overflow-hidden h-screen  fixed left-0 top-0">

    <aside x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform translate-y-full" x-transition:enter-end="transform -translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform -translate-y-0"
        x-transition:leave-end="transform translate-y-full"
        class="w-full h-screen z-10 absolute left-0 bottom-0  flex bg-white flex-col gap-4 justify-start items-start p-4">
        <div class="w-full flex  justify-between items-center">
            <p class=" text-primary font-bold flex gap-0 items-center justify-start text-3xl">
                جولت
            </p>
            <button x-on:click="open = false" class="text-slate-700  p-1 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </button>
        </div>
        <p class="text-lg mt-5 font-semibold text-slate-700">
            القائمة الرئيسية
        </p>
        <p
        x-data
        x-on:click="$dispatch('side-bar-open')"
        class="text-sm font-semibold text-slate-500"
        title="المنتجات الخاصة بك"
        >
            عربة التسوق
        </p>
        <ul class="ml-8  flex flex-col justify-start gap-3 items-start">
            <a href="{{ route('products-index') }}" class="text-sm font-semibold text-slate-500">
                المنتجات
            </a>
            <a href="#" class="text-sm font-semibold text-slate-500">
                الأفضل
            </a>
            <a href="#" class="text-sm font-semibold text-slate-500">
                الفئة
            </a>
            <a href="#"
                class="text-sm font-semibold text-slate-500 {{ Route::currentRouteName() == 'sold' ? 'active' : '' }}">
                من نحن
            </a>

            <a href="#"
                class="text-sm font-semibold text-slate-500 {{ Route::currentRouteName() == 'sold' ? 'active' : '' }}">
                اتصل بنا
            </a>
        </ul>

    </aside>
</div>
