<section class="w-full grid md:grid-cols-2 grid-cols-1 gap-3 lg:grid-cols-4">
    <!-- Total Orders -->
    <div class="w-full border-neutral-400/35 border rounded-md col-span-1 bg-slate-50/40 min-h-28">
        <div class="p-4 flex w-full flex-col gap-3 justify-start items-start">
            <div class="flex w-full justify-between items-center">
                <h2 class="text-xl font-bold text-slate-800">إجمالي الطلبات</h2>
                <a href="#" class="px-2 text-sm rounded-sm bg-teal-600/10 text-teal-600">عرض الكل</a>
            </div>
            <p class="text-3xl font-semibold">
                {{$totalOrders}}
            </p>
        </div>
    </div>

    <!-- Total Revenue -->
    <div class="w-full border-neutral-400/35 border rounded-md col-span-1 bg-slate-50/40 min-h-28">
        <div class="p-4 flex w-full flex-col gap-3 justify-start items-start">
            <div class="flex w-full justify-between items-center">
                <h2 class="text-xl font-bold text-slate-800">إجمالي الإيرادات</h2>
                <a href="#" class="px-2 text-sm rounded-sm bg-teal-600/10 text-teal-600">عرض الكل</a>
            </div>
            <p class="text-3xl font-semibold">
                {{$totalRevenue}}
            </p>
        </div>
    </div>

    <!-- New Customers -->
    <div class="w-full border-neutral-400/35 border-r col-span-1 bg-slate-50/40 min-h-28">
        <div class="p-4">
            <h2 class="text-xl font-bold text-slate-800">العملاء الجدد</h2>
            <p class="text-3xl font-semibold">
                {{$newCustomers}}
            </p>
        </div>
    </div>

    <!-- Additional Placeholder Card -->
    <div class="w-full p-2 bg-slate-50/40 min-h-28 rounded-md border border-slate-400/35">
        <!-- You can add more content here as needed -->
    </div>
</section>
