<div
wire:poll.100ms
x-data="{ open: false }" x-on:keydown.escape="open = false" x-on:keydown.tab="open = false"
    x-on:keydown.shift.tab="open = false" x-on:open-sheet.window="open = true" x-on:close-sheet.window="open = false"
    x-on:click.outside="open = false" x-show="open" style="display: none"
    class="w-full z-[999] overflow-hidden h-screen backdrop-blur-sm bg-black/10 fixed left-0 top-0">
    <div x-on:click="open = false" class="w-full z-[1] overflow-hidden h-screen backdrop-blur-sm bg-black/20"></div>

    <aside x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform -translate-x-full" x-transition:enter-end="transform translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform translate-x-0"
        x-transition:leave-end="transform -translate-x-full"
        class="w-96 z-10 absolute left-0 top-0 h-screen flex bg-white flex-col gap-4 justify-start items-start p-4">
        <div class="w-full flex  justify-between items-center">
            <a
            href="/"
            class=" text-primary font-bold flex gap-0 items-center justify-start text-xl">
            لوحة التحكم

            {{ env('APP_NAME', 'Default App Name') }}
            </a>
                <svg
                class="text-slate-700 ""
                 x-on:click="open = false"
                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
        </div>
        <p class="text-lg mt-5 font-semibold text-slate-700">
            القائمة الرئيسية
        </p>
        <ul class="ml-8  flex flex-col justify-start gap-3 items-start">
            <a href="{{ route('dashboard-index') }}" class="text-sm font-semibold text-slate-500">
                لوحة التحكم
            </a>
            <a  href="{{ route('dashboard-products-index') }}" class="text-sm font-semibold text-slate-500">
                المنتجات
            </a>

            <a href="{{ route('dashboard-orders-index') }}" class="text-sm font-semibold text-slate-500">
                الطلبات
            </a>

            <a href="{{ route('dashboard-customers-index') }}" class="text-sm font-semibold text-slate-500">
                العملاء
            </a>

            <a href="{{ route('dashboard-customers-index') }}" class="text-sm font-semibold text-slate-500">
                التقييمات
            </a>

            <a href="{{ route('dashboard-customers-index') }}" class="text-sm font-semibold text-slate-500">
                التعليقات
            </a>

            <a href="{{ route('dashboard-customers-index') }}" class="text-sm font-semibold text-slate-500">
                الإعدادات
            </a>
        </ul>
    </aside>
</div>
