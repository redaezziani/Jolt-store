{{-- صفحة تفاصيل المنتج تسمح بعرض العنوان وأيضًا خصائص الوصف والكلمات الرئيسية بناءً عليه --}}
<x-store-layout title="صفحة تفاصيل المنتج"
    description="هذه هي صفحة تفاصيل المنتج. يمكنك العثور على جميع المعلومات حول المنتج هنا."
    keywords="منتج، تفاصيل، معلومات">
    >
    <div class="w-full mt-24  gap-0 px-3 overflow-x-hidden lg:max-w-[75%] grid md:grid-cols-3">
        <div class="col-span-3 overflow-hidden flex">
            @include('components.products-list-path-link')
        </div>
        <div class="col-span-3 mt-10 overflow-hidden flex flex-col gap-2">
            <h2 class="text-slate-900 uppercase text-xl font-bold">
                ابحث عن المزيد من المنتجات
            </h2>
            <p class="text-slate-600 text-base">
                ابحث واكتشف المزيد من المنتجات عن طريق التصفية أو البحث أدناه.
            </p>
        </div>
        <div class="w-full col-span-3">
            <livewire:all-products />
        </div>
    </div>
    <div class="w-full grid md:max-w-7xl grid-cols-1 md:grid-cols-3 justify-center items-center">
        @include('components.custom.footer-page')
    </div>
</x-store-layout>
