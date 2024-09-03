<aside class=" w-96  left-0 top-0 h-screen sticky hidden  md:flex flex-col gap-4 justify-start items-center px-2 py-2">
    <aside class="flex  flex-col w-full h-screen px-5 py-8">
        <a href="{{ route('dashboard-index') }}" class="flex mt-12 items-center justify-start ">
            <svg fill="none" class="text-white size-10 mt-2" viewBox="0 0 256 256" width="24" height="24"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="m200.035 48.61c-4.67-27.94-29.16-48.61-29.16-48.61v30.78l-14.54 3.75-9.11-10.97-4.81 9.46c-9.92-2.7-23.58-4.44-42.37-4.44-18.7901 0-32.4501 1.75-42.3701 4.44l-4.81-9.46-9.11 10.97-14.54-3.75v-30.78s-24.48997 20.67-29.1599684 48.61l32.1399684 11.12c1.05 19.43 9.79 71.88 12.29 76.64 2.66 5.07 16.78 19.56 27.83 25.13 0 0 4-4.23 6.44-7.96 3.1 3.65 19.11 16.45 21.3001 16.45 2.19 0 18.2-12.79 21.3-16.45 2.44 3.73 6.44 7.96 6.44 7.96 11.05-5.57 25.17-20.06 27.83-25.13 2.5-4.76 11.24-57.21 12.29-76.64l32.14-11.12zm-46.19 44.74-21.75 1.94 1.91 26.67s-13.23 10.95-33.96 10.95c-20.7301 0-33.9601-10.95-33.9601-10.95l1.91-26.67-21.75-1.94-3.72-30.04 36.05 12.48-2.8 37.39c6.7 1.7 13.75 3.39 24.2801 3.39 10.53 0 17.57-1.69 24.27-3.39l-2.8-37.39 36.05-12.48-3.72 30.04z"
                    fill="#ffff"></path>
            </svg>
            <span class="text-2xl font-bold text-white">
                لوحة التحكم للموقع
            </span>
        </a>

        <div class="flex flex-col justify-between flex-1 mt-6">
            <nav class="-mx-3 space-y-3 ">
                <a href="{{ route('dashboard-index') }}"
                    class="flex items-center px-3 py-2 text-gray-50 transition-colors duration-300 transform rounded-lg dark:text-amber-300  dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-amber-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>

                    <span class="mx-2 text-sm font-medium">الرئيسية</span>
                </a>

                <a href="{{ route('dashboard-products-index') }}"
                    class="flex items-center px-3 py-2 text-gray-50 transition-colors duration-300 transform rounded-lg dark:text-amber-300  dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-amber-200">
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
                    class="flex items-center px-3 py-2 text-gray-50 transition-colors duration-300 transform rounded-lg dark:text-amber-300  dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-amber-200">
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
                    class="flex items-center px-3 py-2 text-gray-50 transition-colors duration-300 transform rounded-lg dark:text-amber-300  dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-amber-200">
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

            <div class=" mt-10">
                <div class="flex items-center justify-between">
                    <h2 class="text-base  text-gray-50 dark:text-white">
                        اتصل بالمطور
                    </h2>
                    </h2>
                </div>

                <nav class="mt-7 -mx-3 space-y-3 ">
                    <a href="https://github.com/redaezziani">
                        <button
                            class="flex items-center justify-between w-full px-3 py-1 text-xs font-medium text-gray-50 transition-colors duration-300 transform rounded-md dark:text-amber-300  dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-amber-200">
                            <div class="flex items-center gap-x-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-brand-github">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                                </svg>
                                <span>
                                    Github Profile
                                </span>
                            </div>


                        </button>
                    </a>
                    <a href="https://www.linkedin.com/in/reda-ezziani-43a121295/">
                        <button
                            class="flex items-center justify-between w-full px-3 py-1 text-xs font-medium text-gray-50 transition-colors duration-300 transform rounded-md dark:text-amber-300  dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-amber-200">
                            <div class="flex items-center gap-x-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-brand-linkedin">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                    <path d="M8 11l0 5" />
                                    <path d="M8 8l0 .01" />
                                    <path d="M12 16l0 -5" />
                                    <path d="M16 16v-3a2 2 0 0 0 -4 0" />
                                </svg>
                                <span>
                                    Linkedin Profile
                                </span>
                            </div>
                        </button>
                    </a>
                </nav>
            </div>
        </div>
    </aside>
</aside>
