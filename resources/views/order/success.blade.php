{{-- صفحة تأكيد الطلب - عرض العنوان والوصف والكلمات الرئيسية بناءً على البيانات --}}
<x-store-layout
    title="صفحة تأكيد الطلب"
    description="هذه الصفحة تؤكد نجاح عملية الشراء. يمكنك العثور هنا على معلومات حول تفاصيل طلبك."
    keywords="تأكيد الطلب, نجاح الشراء, تفاصيل الطلب, معلومات الشراء"
>
    <div class="w-full mt-24 gap-0 px-3 overflow-x-hidden lg:max-w-[75%] grid md:grid-cols-3">
        <div class="col-span-3 overflow-hidden flex">
        </div>
        <div class="col-span-3 justify-center h-96 items-center mt-10 overflow-hidden flex flex-col gap-2">
            <h1 class="text-xl text-primary font-semibold">
                شكراً على طلبك.
            </h1>
            <p class="text-slate-600 text-center max-w-xl">
                لقد تم إتمام طلبك بنجاح. ستتلقى بريدًا إلكترونيًا قريبًا يحتوي على تفاصيل الطلب. شكراً لتسوقك معنا!
            </p>
            <a href="{{ route('home') }}" class="mt-4 px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark">
                العودة إلى الصفحة الرئيسية
            </a>
        </div>
    </div>

    <div class="w-full grid md:max-w-7xl grid-cols-1 md:grid-cols-3 justify-center items-center">
    </div>
</x-store-layout>
