<section
class=" w-full grid grid-cols-3 gap-3 mt-8"
>
<div class="w-full border-neutral-400/35 border rounded-md col-span-1 ">
    <div class="p-4 flex w-full flex-col gap-3 justify-start items-start">
        <div class="flex w-full  justify-between items-center">
            <h2 class="text-xl font-bold text-slate-800">Total Orders</h2>

            <a class=" px-2 text-sm rounded-sm bg-teal-600/10 text-teal-600">View All</a>
        </div>
        <p class="text-3xl font-semibold">
            {{$totalOrders}}
        </p>
    </div>
</div>

<div class="w-full border-neutral-400/35 border rounded-md col-span-1 ">
    <div class="p-4 flex w-full flex-col gap-3 justify-start items-start">
        <div class="flex w-full  justify-between items-center">
            <h2 class="text-xl font-bold text-slate-800">
                Total Revenue
            </h2>

            <a class=" px-2 text-sm rounded-sm bg-teal-600/10 text-teal-600">View All</a>
        </div>
        <p class="text-3xl font-semibold">
            {{$totalRevenue}}
        </p>
    </div>
</div>
</div>


<div class="w-full border-neutral-400/35 border-r col-span-1 ">
    <div class="p-4">
        <h2 class="text-xl font-bold text-slate-800">
            New Customers
        </h2>
        <p class="text-3xl font-semibold">
            {{$newCustomers}}
        </p>
    </div>
</div>


</section>
