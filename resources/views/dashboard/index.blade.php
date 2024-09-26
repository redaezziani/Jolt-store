<x-dashboard-layout title="لوحة التحكم الرئيسية لمتجر Jolt" description="هذه هي لوحة التحكم للمسؤول لمتجر Jolt"
    keywords="متجر Jolt, مسؤول, لوحة التحكم">
    <div class="w-full flex justify-between mt-4 gap-3 items-start flex-wrap">
        <div class="flex flex-col gap-2">
            <h2 class="text-xl font-bold text-slate-700">
                لوحة التحكم الرئيسية
            </h2>
            <p class="text-slate-500 text-sm">
                مرحباً بكم في لوحة التحكم الرئيسية، يمكنك من هنا متابعة الطلبات والمنتجات والعملاء بكل سهولة.
            </p>
        </div>
    </div>
    <section class=" w-full grid   mt-5 lg:h-[48rem] grid-cols-1 lg:grid-rows-6 gap-3 lg:grid-cols-4">
        <livewire:total-orders>
        <livewire:total-revenue>
        <livewire:total-products-sold>
        <div class="w-full shadow-sm rounded-lg col-span-1 bg-white row-span-3 border border-slate-400/35">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-700">حالة الطلبات</h3>
                            <p class="text-slate-500 text-sm">
                                يمكنك من خلال هذا الرسم البياني متابعة حالة الطلبات بكل سهولة
                            </p>
                            <livewire:order-status-pie-chart />
                        </div>
                    </div>
                    <div
                        class="w-full shadow-sm rounded-lg flex-col justify-between items-start flex lg:col-span-3 bg-white lg:row-span-5 border border-slate-400/35">
                        <div class="p-4 w-full h-full flex-col justify-between items-start flex">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-semibold text-gray-700">
                                    مبيعات الشهر
                                </h3>
                                <p class="text-slate-500 text-sm">
                                    يمكنك من خلال هذا الرسم البياني متابعة مبيعات الشهر بكل سهولة
                                </p>
                            </div>
                            <livewire:sales-area-chart>
                        </div>
        </div>
        <div class="w-full shadow-sm rounded-lg col-span-1 bg-white row-span-3 border border-slate-400/35">
                        <!-- Your content here -->
        </div>
    </section>



    <script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash/lodash.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</x-dashboard-layout>
