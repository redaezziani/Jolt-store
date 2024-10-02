{{-- Product details page lets render the titel and also desc and keywords props base on it  --}}
<x-store-layout
    title="تفاصيل الطلب"
    description="قم بمراجعة تفاصيل طلبك وتقديم المعلومات اللازمة لإتمام الشراء."
    keywords=""

    >
    <div class=" w-full  gap-0 px-3 overflow-x-hidden lg:max-w-[75%] grid  md:grid-cols-3 ">

        <div class="col-span-3 mt-32  overflow-hidden flex">
            <nav class="flex gap-1 justify-start items-center line-clamp-1 truncate font-medium group  transition-all ease-in-out duration-300">
                <a href="{{ route('home') }}" class="text-sm text-teal-700 group-hover:text-teal-700">الصفحة الرئيسية</a>
                <span class="text-sm text-slate-500">/</span>
                <p  class="text-sm text-slate-500 hover:text-slate-700">
                    تفاصيل الطلب
                </a>
            </nav>
        </div>
        <div class="col-span-3 mt-10 overflow-hidden flex flex-col gap-2">
            <h2 class="text-slate-700 uppercase text-xl font-bold">
            أكمل طلبك
            </h2>
            <p class="text-slate-600 text-base">
            قم بمراجعة تفاصيل طلبك وتقديم المعلومات اللازمة لإتمام الشراء.
            </p>
        </div>

        <div class="w-full col-span-3">
            <livewire:create-order />
        </div>
    </div>
    <div class="w-full grid  md:max-w-7xl grid-cols-1 md:grid-cols-3 justify-center items-center">
        @include('components.custom.footer-page')
    </div>
</x-store-layout>
