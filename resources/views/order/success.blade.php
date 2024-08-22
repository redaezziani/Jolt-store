{{-- Product details page lets render the titel and also desc and keywords props base on it  --}}
<x-store-layout title="Detials page for product"
    description="This is the details page for the product . You can find all the information about the product here."
    keywords="product, details, information">
    >

    <div class=" w-full mt-24 gap-0 px-3 overflow-x-hidden lg:max-w-[75%] grid  md:grid-cols-3 ">
        <div class="col-span-3 overflow-hidden flex">
        </div>
        <div class="col-span-3 justify-center h-96 items-center mt-10 overflow-hidden flex flex-col gap-2">
            <h1
            class=" text-xl text-primary font-semibold"
            >
                Thanks for your order .
            </h1>
            <p
            class=" text-slate-600 text-center max-w-xl"
            >
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime quasi odit, beatae distinctio laborum nostrum dignissimos harum tempora iusto illum sint? Perspiciatis optio sit exercitationem at nihil delectus est cumque.
            </p>
        </div>


    </div>
    <div class="w-full grid  md:max-w-7xl grid-cols-1 md:grid-cols-3 justify-center items-center">
        @include('components.custom.footer-page')
    </div>
</x-store-layout>
