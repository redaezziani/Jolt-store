<x-dashboard-layout
    title="Products"
    description="Products"
    keywords="Products"
>
<x-sheet-bar>
<livewire:create-products>

</x-sheet-bar>
<div class="flex flex-col gap-2 justify-start items-start gap-x-2">
    <h3 class="text-2xl font-bold text-slate-800">
        صفحة المنتجات
    </h3>
    <p class="text-slate-500">
        هذه هي صفحة المنتجات
    </p>
</div>
<livewire:products-table>
</x-dashboard-layout>
