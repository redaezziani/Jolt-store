{{-- الصفحة الرئيسية --}}
<x-store-layout
    title="متجر جولت"
    description="تسوق من متجر جولت واحصل على خصم 60٪ على جميع المنتجات فقط لهذا الأسبوع ، لا تفوت الفرصة للاستمتاع بالتسوق معنا بأفضل جودة وسعر يمكنك العثور عليه."
    keywords="متجر جولت، تسوق، خصم 60٪، منتجات، جودة، سعر"
>
<div
    class="w-full h-[90vh] overflow-hidden relative border-b   border-slate-300/35 flex justify-start items-start gap-4 flex-col">
  <div class="flex z-10 max-w-7xl mx-auto flex-col gap-4 mt-32">
    <h2
    id="hero-title"
    class=" text-7xl max-w-4xl text-white "
    >
        تسوق من متجر جولت واحصل على خصم 60٪
    </h2>
    <p
    id="hero-description"
    class=" text-2xl max-w-4xl text-white "
    >
        على جميع المنتجات فقط لهذا الأسبوع ، لا تفوت الفرصة للاستمتاع بالتسوق معنا بأفضل جودة وسعر يمكنك العثور عليه.
    </p>

    <a
    id="hero-button"
    href="{{ route('products-index') }}">
        <button
        class="  font-medium w-32  rounded-full text-slate-800 px-7 py-2.5  bg-white hover:bg-white/90"
        >
            تسوق الآن
        </button>
    </a>
  </div>
<img src="{{ asset('storage/hero.jpg') }}" alt="صورة بطل" class="absolute -z-[1] object-cover">
<img src="{{ asset('storage/star-1.png') }}" alt="صورة بطل" class="absolute  left-16 bottom-20 z-10 w-14 object-cover">
<img src="{{ asset('storage/star-2.png') }}" alt="صورة بطل" class="absolute  right-32 top-32 z-10 w-14 object-cover">
<div class="flex absolute right-4 bottom-10 gap-x-3 z-10">
    <span class=" w-8 bg-white h-0.5"></span>
    <span class=" w-8 bg-white h-0.5"></span>
    <span class=" w-8 bg-white h-0.5"></span>
    <span class=" w-8 bg-white h-0.5"></span>
</div>
</div>
    <div class="relative  flex items-center flex-col justify-start w-full min-h-screen gap-2 overflow-hidden">
        <section class="mt-10 pb-3 px-3 flex flex-col gap-4 justify-center items-center md:max-w-[100%] lg:max-w-[70%]">
            <h3

            class=" text-neutral-900 flex gap-x-2 justify-start items-center text-3xl font-bold"
            >
            <span class=" w-14 bg-slate-900 h-1"></span>
                الوافدين الجدد
            <span class=" w-14 bg-slate-900 h-1"></span>

            </h3>

            <p
            class=" text-base text-center max-w-3xl text-neutral-800"
            >
            اكتشف أحدث الاتجاهات في متجرنا بأفضل جودة وسعر يمكنك العثور على ما تبحث عنه.
            </p>
            <livewire:new-arrivals  >

        </section>
        <section class="mt-5 pb-3 w-full flex flex-col gap-4 justify-center items-center md:max-w-[100%] lg:max-w-[70%]">
            <livewire:new-category>
        </section>

        <section class="mt-10 pb-3 px-3 flex flex-col gap-4 justify-center items-center md:max-w-[100%] lg:max-w-[70%]">
            <h3

            class=" text-neutral-900 flex gap-x-2 justify-start items-center text-3xl font-bold"
            >
            <span class=" w-14 bg-slate-900 h-1"></span>
                منتجات عشوائية
            <span class=" w-14 bg-slate-900 h-1"></span>

            </h3>

            <p
            class=" text-base text-center max-w-3xl text-neutral-800"
            >
            اطلع على بعض منتجاتنا العشوائية بأفضل جودة وسعر يمكنك العثور على ما تبحث عنه.
            </p>
            <livewire:random-products
            >
            <a href="{{ route('products-index') }}">

            </a>
        </section>
    </div>
<div class="w-full grid  md:max-w-7xl grid-cols-1 md:grid-cols-3 justify-center items-center">
    @include('components.custom.footer-page')
</div>
</x-store-layout>
