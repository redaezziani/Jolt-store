<x-dashboard-layout
    title="Dashboard Jolt Admin dashboard"
    description="this is the dashboard for the admin of Jolt Store"
    keywords="Jolt Store, admin, dashboard"
>

{{-- @vite('resources/js/dashboard.js')
<div
class="mt-5 flex w-full flex-col">
<div class="w-full h-80 grid grid-cols-3 gap-3 mt-8">
    <div class="border shadow-sm rounded-md pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70" id="test"></div>
</div> --}}

<div class="flex  flex-col justify-start items-start">
    <h2
    class=" text-slate-800 font-semibold"
    >
        Stats Cards
    </h2>
    <p
    class=" text-slate-500"
    >
        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
    </p>
</div>
<section class="w-full grid md:grid-cols-2 grid-cols-1 gap-3 lg:grid-cols-4 ">
    <article
    class=" w-full p-2 bg-slate-50/40 min-h-28 rounded-md border border-slate-400/35"></article>

    <article
    class=" w-full p-2 bg-slate-50/40 min-h-28 rounded-md border border-slate-400/35"></article>

    <article
    class=" w-full p-2 bg-slate-50/40 min-h-28 rounded-md border border-slate-400/35"></article>

    <article
    class=" w-full p-2 bg-slate-50/40 min-h-28 rounded-md border border-slate-400/35"></article>
</section>
<div class="flex  flex-col justify-start items-start">
    <h2
    class=" text-slate-800 font-semibold"
    >
        Charts Stats
    </h2>
    <p
    class=" text-slate-500"
    >
        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
    </p>
</div>
<section class="w-full grid md:grid-cols-2 grid-cols-1 gap-3 lg:grid-cols-4 ">
    <article
    class=" w-full p-2 md:col-span-1 lg:col-span-2 bg-slate-50/40 min-h-80 rounded-md border border-slate-400/35"></article>

    <article
    class=" w-full p-2 md:col-span-1 lg:col-span-1 bg-slate-50/40 min-h-80 rounded-md border border-slate-400/35"></article>

    <article
    class=" w-full p-2 md:col-span-1 lg:col-span-1 bg-slate-50/40 min-h-80 rounded-md border border-slate-400/35"></article>
</section>
{{-- <section
class=" w-full"
>
    <livewire:products-table>
</section> --}}
{{-- <livewire:dashboard-stats>
    --}}
<livewire:create-category />
</div>
<script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>


</x-dashboard-layout>
