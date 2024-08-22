<div class="w-full mt-10">
    <div class="w-full mt-5 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
        @foreach ($relatedProducts as $product)
            @include('components.custom.product.product-card', ['product' => $product])
        @endforeach
    </div>

    {{-- <div class="w-full mt-5 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
        <article
        class="w-full     flex flex-col justify-start items-center relative">

        <a
        class="relative flex justify-center bg-slate-200 animate-pulse items-center  rounded-md w-full aspect-[9/12] h-auto ">

        </a>
        <div class="flex w-full flex-col gap-2 justify-start mt-2 items-start">
            <div class=" w-1/2 p-1 bg-slate-200 animate-pulse ">

            </div>

            <div class=" w-full p-1 bg-slate-200 animate-pulse ">

            </div>
        </div>
        </article>
    </div> --}}
</div>
