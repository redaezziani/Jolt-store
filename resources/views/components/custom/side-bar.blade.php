<aside class=" w-96  left-0 top-0 h-screen  border-l   border-slate-400/35  sticky hidden  md:flex flex-col gap-4 justify-start items-center px-2 py-2">
    <aside class="flex  flex-col w-full justify-between items-center h-full   px-5 py-6">


        <div class="flex flex-col w-full  flex-1">
            <a class="text-slate-700 font-semibold flex gap-0 items-center justify-start text-xl" href="{{ route('home') }}">
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
            <nav class="-mx-3 space-y-3 mt-14 ">
                <a href="{{ route('dashboard-index') }}"
                    class="flex items-end px-3 py-2  text-slate-600 font-bold transition-colors duration-500 transform rounded-lg  dark:hover:text-slate-200 hover:text-primary ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>

                    <span class="mx-2 text-sm font-medium">الرئيسية</span>
                </a>

                <a href="{{ route('dashboard-products-index') }}"
                    class="flex items-end px-3 py-2 bg-slate-50  text-primary font-bold transition-colors duration-300 transform rounded-lg  dark:hover:text-slate-200 hover:text-primary ">
                    <svg
                    class="w-5 h-5"
                    id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5"  ><defs><style>.cls-637b82edf95e86b59c57a09b-1{fill:none;stroke:currentColor;stroke-miterlimit:10;}</style></defs><polygon class="cls-637b82edf95e86b59c57a09b-1" points="14.86 22.5 9.14 22.5 9.14 3.41 12 1.5 14.86 3.41 14.86 22.5"></polygon><polygon class="cls-637b82edf95e86b59c57a09b-1" points="20.59 22.5 14.86 22.5 14.86 3.41 17.73 1.5 20.59 3.41 20.59 22.5"></polygon><polygon class="cls-637b82edf95e86b59c57a09b-1" points="9.14 22.5 3.41 22.5 3.41 3.41 6.27 1.5 9.14 3.41 9.14 22.5"></polygon><line class="cls-637b82edf95e86b59c57a09b-1" x1="5.32" y1="8.18" x2="7.23" y2="8.18"></line><line class="cls-637b82edf95e86b59c57a09b-1" x1="11.05" y1="8.18" x2="12.95" y2="8.18"></line><line class="cls-637b82edf95e86b59c57a09b-1" x1="16.77" y1="8.18" x2="18.68" y2="8.18"></line><line class="cls-637b82edf95e86b59c57a09b-1" x1="5.32" y1="17.73" x2="7.23" y2="17.73"></line><line class="cls-637b82edf95e86b59c57a09b-1" x1="11.05" y1="17.73" x2="12.95" y2="17.73"></line><line class="cls-637b82edf95e86b59c57a09b-1" x1="16.77" y1="17.73" x2="18.68" y2="17.73"></line></svg>

                    <span class="mx-2 text-sm font-medium">
                        المنتجات
                    </span>
                    </span>
                </a>


                <a href="{{ route('dashboard-orders-index') }}"
                    class="flex items-end px-3 py-2 text-slate-600 font-bold transition-colors duration-300 transform rounded-lg  dark:hover:text-slate-200 hover:text-primary ">
                    <svg
                    class="w-5 h-5"
                     id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" ><defs><style>.cls-637b87aff95e86b59c57a198-1{fill:none;stroke:currentColor;stroke-miterlimit:10;}</style></defs><circle class="cls-637b87aff95e86b59c57a198-1" cx="6.27" cy="17.73" r="1.91"></circle><circle class="cls-637b87aff95e86b59c57a198-1" cx="17.73" cy="17.73" r="1.91"></circle><polyline class="cls-637b87aff95e86b59c57a198-1" points="4.36 17.73 1.5 17.73 1.5 4.36 18.68 4.36 18.68 8.18 20.59 12 22.5 13.07 22.5 17.73 19.64 17.73"></polyline><line class="cls-637b87aff95e86b59c57a198-1" x1="15.82" y1="17.73" x2="8.18" y2="17.73"></line><polyline class="cls-637b87aff95e86b59c57a198-1" points="20.59 12 14.86 12 14.86 8.18 18.68 8.18"></polyline></svg>

                    <span class="mx-2 text-sm font-medium">
                        الطلبات
                    </span>
                </a>

                <a href="{{ route('dashboard-customers-index') }}"
                    class="flex items-end px-3 py-2 text-slate-600 font-bold transition-colors duration-300 transform rounded-lg  dark:hover:text-slate-200 hover:text-primary ">
                    <svg
                    class="w-5 h-5"
                    id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" ><defs><style>.cls-637b7f18f95e86b59c57a00b-1{fill:none;stroke:currentColor;stroke-miterlimit:10;}</style></defs><circle class="cls-637b7f18f95e86b59c57a00b-1" cx="19.64" cy="11.05" r="1.91"></circle><path class="cls-637b7f18f95e86b59c57a00b-1" d="M16.77,15.82h0A2.87,2.87,0,0,1,19.64,13h0a2.87,2.87,0,0,1,2.86,2.87h0"></path><circle class="cls-637b7f18f95e86b59c57a00b-1" cx="4.36" cy="11.05" r="1.91"></circle><path class="cls-637b7f18f95e86b59c57a00b-1" d="M1.5,15.82h0A2.87,2.87,0,0,1,4.36,13h0a2.87,2.87,0,0,1,2.87,2.87h0"></path><polyline class="cls-637b7f18f95e86b59c57a00b-1" points="10.09 2.46 7.23 5.32 18.68 5.32"></polyline><polyline class="cls-637b7f18f95e86b59c57a00b-1" points="13.91 21.55 16.77 18.68 5.32 18.68"></polyline></svg>

                    <span class="mx-2 text-sm font-medium">
                        الزبائن
                    </span>
                </a>

                <a href="{{ route('dashboard-customers-index') }}"
                    class="flex items-end px-3 py-2 text-slate-600 font-bold transition-colors duration-300 transform rounded-lg  dark:hover:text-slate-200 hover:text-primary ">
                    <svg
                    class="w-5 h-5"
                    id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" ><defs><style>.cls-6374f8d9b67f094e4896c621-1{fill:none;stroke:currentColor;stroke-miterlimit:10;}</style></defs><path class="cls-6374f8d9b67f094e4896c621-1" d="M12,1.48C6.2,1.48,1.5,5.75,1.5,11a9,9,0,0,0,2,5.53l-1,5,6.66-1.33a11.39,11.39,0,0,0,2.89.38c5.8,0,10.5-4.28,10.5-9.55S17.8,1.48,12,1.48Z"></path><line class="cls-6374f8d9b67f094e4896c621-1" x1="11.05" y1="11.02" x2="12.95" y2="11.02"></line><line class="cls-6374f8d9b67f094e4896c621-1" x1="15.82" y1="11.02" x2="17.73" y2="11.02"></line><line class="cls-6374f8d9b67f094e4896c621-1" x1="6.27" y1="11.02" x2="8.18" y2="11.02"></line></svg>
                    {{-- products commenst --}}
                    <span class="mx-2 text-sm font-medium">
                        التعليقات
                    </span>
                </a>

                <a href="{{ route('dashboard-customers-index') }}"
                class="flex items-end px-3 py-2 text-slate-600 font-bold transition-colors duration-300 transform rounded-lg  dark:hover:text-slate-200 hover:text-primary ">
                <svg
                class="w-5 h-5"
                id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" ><defs><style>.cls-6374f8d9b67f094e4896c636-1{fill:none;stroke:currentColor;stroke-miterlimit:10;}</style></defs><path class="cls-6374f8d9b67f094e4896c636-1" d="M20.59,12a8.12,8.12,0,0,0-.15-1.57l2.09-1.2-2.87-5-2.08,1.2a8.65,8.65,0,0,0-2.72-1.56V1.5H9.14V3.91A8.65,8.65,0,0,0,6.42,5.47L4.34,4.27l-2.87,5,2.09,1.2a8.29,8.29,0,0,0,0,3.14l-2.09,1.2,2.87,5,2.08-1.2a8.65,8.65,0,0,0,2.72,1.56V22.5h5.72V20.09a8.65,8.65,0,0,0,2.72-1.56l2.08,1.2,2.87-5-2.09-1.2A8.12,8.12,0,0,0,20.59,12Z"></path><circle class="cls-6374f8d9b67f094e4896c636-1" cx="12" cy="12" r="3.82"></circle></svg>
                {{-- products settings --}}
                <span class="mx-2 text-sm font-medium">
                    الإعدادات
                </span>
            </a>
            </nav>
        </div>
        {{--this is about the admin profile name and status role--}}
       <div class="w-full justify-between items-center ">
        <div class="flex gap-x-2">
            <span
            class="flex items-center justify-center h-9 w-9 bg-slate-200 rounded-full">


            </span>
            <div class="flex  w-full justify-start items-start flex-col text-slate-600">
                <a class="text-sm font-semibold flex gap-2 justify-start items-center text-slate-500">
                    <p>{{ auth()->user()->name }}</p>
                </a>
                @if (auth()->user()->role == 'admin')
                    <a class="text-sm font-semibold flex gap-2 justify-start items-center text-slate-400"
                        href="{{ route('dashboard-index') }}">
                        <p>{{ __('dashboard') }}</p>
                    </a>
                @endif
        </div>

        <svg
        class="w-5 h-5 mt-2 text-slate-400"
        xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrows-vertical"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7l4 -4l4 4" /><path d="M8 17l4 4l4 -4" /><path d="M12 3l0 18" /></svg>
        </div>
       </div>
    </aside>
</aside>
