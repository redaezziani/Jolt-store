<aside class=" w-96  left-0 top-0 h-screen  border-l   border-slate-400/35  sticky hidden  md:flex flex-col gap-4 justify-start items-center px-2 py-2">
    <aside class="flex  flex-col w-full h-full mt-8  px-5 py-8">
        <a href="{{ route('dashboard-index') }}" class="flex mt-16 items-center justify-start ">

        </a>

        <div class="flex flex-col justify-between flex-1 mt-6">
            <nav class="-mx-3 space-y-3 ">
                <a href="{{ route('dashboard-index') }}"
                    class="flex items-end px-3 py-2 text-slate-800 font-bold transition-colors duration-500 transform rounded-lg dark:text-amber-300  dark:hover:bg-slate-800 dark:hover:text-slate-200 hover:text-primary ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>

                    <span class="mx-2 text-sm font-medium">الرئيسية</span>
                </a>

                <a href="{{ route('dashboard-products-index') }}"
                    class="flex items-end px-3 py-2 text-slate-800 font-bold transition-colors duration-300 transform rounded-lg dark:text-amber-300  dark:hover:bg-slate-800 dark:hover:text-slate-200 hover:text-primary ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-building-factory">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 21c1.147 -4.02 1.983 -8.027 2 -12h6c.017 3.973 .853 7.98 2 12" />
                        <path d="M12.5 13h4.5c.025 2.612 .894 5.296 2 8" />
                        <path
                            d="M9 5a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1" />
                        <path d="M3 21l19 0" />
                    </svg>

                    <span class="mx-2 text-sm font-medium">
                        المنتجات
                    </span>
                    </span>
                </a>


                <a href="{{ route('dashboard-orders-index') }}"
                    class="flex items-end px-3 py-2 text-slate-800 font-bold transition-colors duration-300 transform rounded-lg dark:text-amber-300  dark:hover:bg-slate-800 dark:hover:text-slate-200 hover:text-primary ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-truck-delivery">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                        <path d="M3 9l4 0" />
                    </svg>

                    <span class="mx-2 text-sm font-medium">
                        الطلبات
                    </span>
                </a>

                <a href="{{ route('dashboard-customers-index') }}"
                    class="flex items-end px-3 py-2 text-slate-800 font-bold transition-colors duration-300 transform rounded-lg dark:text-amber-300  dark:hover:bg-slate-800 dark:hover:text-slate-200 hover:text-primary ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-star">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h.5" />
                        <path
                            d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                    </svg>

                    <span class="mx-2 text-sm font-medium">
                        الزبائن
                    </span>
                </a>
            </nav>


        </div>
    </aside>
</aside>
