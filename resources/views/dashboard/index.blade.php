<x-dashboard-layout
    title="Dashboard Jolt Admin dashboard"
    description="this is the dashboard for the admin of Jolt Store"
    keywords="Jolt Store, admin, dashboard"
>

@vite('resources/js/dashboard.js')
<div
class="mt-5 flex w-full flex-col">
<div class="w-full h-80 grid grid-cols-3 gap-3 mt-8">
    <div class="border shadow-sm rounded-md pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70" id="test"></div>
</div>
<livewire:create-category />
</div>
<script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>


</x-dashboard-layout>
