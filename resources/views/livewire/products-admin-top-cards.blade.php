<div
wire:poll.500ms
class="w-full gap-3 grid mt-5 lg:grid-cols-4">
    <article class="rounded-lg bg-white p-3 min-h-28 border border-slate-400/35">
        <h2 class="text-xl font-bold text-slate-500">إجمالي المنتجات</h2>
        <p class="text-2xl lg:text-4xl font-bold mt-3 text-primary/80">{{ $totalProducts }}</p>
    </article>
    <article class="rounded-lg bg-white p-3 min-h-28 border border-slate-400/35">
        <h2 class="text-xl font-bold text-slate-500">المنتجات المطلوبة</h2>
        <p class="text-2xl lg:text-4xl font-bold mt-3 text-primary/80">{{ $productsOrdered }}</p>
    </article>
    <article class="rounded-lg bg-white p-3 min-h-28 border border-slate-400/35">
        <h2 class="text-xl font-bold text-slate-500">إجمالي المخزون</h2>
        <p class="text-2xl lg:text-4xl font-bold mt-3 text-primary/80">{{ $totalStock }}</p>
    </article>
    <article class="rounded-lg bg-white p-3 min-h-28 border border-slate-400/35">
        <h2 class="text-xl font-bold text-slate-500">المنتجات التي بها خصومات</h2>
        <p class="text-2xl lg:text-4xl font-bold mt-3 text-primary/80">{{ $productsWithDiscount }}</p>
    </article>
</div>
