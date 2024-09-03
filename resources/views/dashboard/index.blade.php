<x-dashboard-layout title="لوحة التحكم الرئيسية لمتجر Jolt" description="هذه هي لوحة التحكم للمسؤول لمتجر Jolt"
    keywords="متجر Jolt, مسؤول, لوحة التحكم">



    <div class="flex flex-col justify-start items-start">
        <h2 class="text-slate-800 font-semibold">
            بطاقات الإحصائيات
        </h2>
        <p class="text-slate-500">
            هذا نص وهمي تم إنشاؤه لأغراض العرض فقط.
        </p>
    </div>
    <livewire:dashboard-stats>
        <div class="flex flex-col justify-start items-start">
            <h2 class="text-slate-800 font-semibold">
                إحصائيات الرسوم البيانية
            </h2>
            <p class="text-slate-500">
                هذا نص وهمي تم إنشاؤه لأغراض العرض فقط.
            </p>
        </div>
        <section class="w-full grid md:grid-cols-2 grid-cols-1 gap-3 lg:grid-cols-4 ">
            <article
                class="w-full p-2 md:col-span-1 lg:col-span-2 bg-slate-50/40 min-h-80 rounded-md border border-slate-400/35">
            </article>

            <article
                class="w-full p-2 md:col-span-1 lg:col-span-1 bg-slate-50/40 min-h-80 rounded-md border border-slate-400/35">
            </article>

            <article
                class="w-full p-2 md:col-span-1 lg:col-span-1 bg-slate-50/40 min-h-80 rounded-md border border-slate-400/35">
            </article>
        </section>
       
        <livewire:create-category />
        </div>
        <script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>

</x-dashboard-layout>
