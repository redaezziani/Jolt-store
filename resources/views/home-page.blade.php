{{-- Home Page  --}}
<x-store-layout
    title="Jolt Store"
    description="Shop from Jolt Store  and get the 60% off on all products just for this week , don't miss the chance injoy shopping with us with the best quality and price you can find."
    keywords="Jolt Store, shop, 60% off, products, quality, price"
>
<div
    class="w-full h-[80vh] overflow-hidden relative flex justify-center items-center gap-4 flex-col">
        <img class="w-full h-full absolute z-0 object-cover grayscale" src="{{ asset('storage/cover-web-hero.jpg') }}"
        alt="hero-image" />
        <div class="w-full bg-gradient-to-b from-black/25 via-transparent to-transparent z-10 absolute h-full">
        </div>
            <h2
            id="title"

            class=" z-10 relative text-7xl font-semibold text-wrap text-white"
            >
                Jolt Store <span id="b" class=" text-teal-800">.</span>
            </h2>
            <p
            id="description"
            class=" max-w-4xl text-lg  font-semibold text-white z-10 text-center"
            >
                Shop from Jolt Store  and get the 60% off on all products just for this week ,
                don't miss the chance injoy shopping with us with the best quality and price you can find.
            </p>
    </div>
    <div class="relative  flex items-center flex-col justify-start w-full min-h-screen gap-2 overflow-hidden">
        <section class="mt-10 pb-3 px-3 flex flex-col gap-4 justify-center items-center md:max-w-[100%] lg:max-w-[70%]">
            <h3

            class=" text-neutral-900 text-3xl font-bold"
            >
                New Arrivals
            </h3>

            <p
            class=" text-base text-center max-w-3xl text-neutral-800"
            >
            Discover the latest trends in our store with the best quality and price you can find what you are looking for.
            </p>
            <livewire:new-arrivals
            >

        </section>
        <section class="mt-5 pb-3 w-full flex flex-col gap-4 justify-center items-center md:max-w-[100%] lg:max-w-[70%]">
            <livewire:new-category>
        </section>

        <section class="mt-10 pb-3 px-3 flex flex-col gap-4 justify-center items-center md:max-w-[100%] lg:max-w-[70%]">
            <h3

            class=" text-neutral-900 text-3xl font-bold"
            >
                Random Products
            </h3>

            <p
            class=" text-base text-center max-w-3xl text-neutral-800"
            >
            see some of our random products with the best quality and price you can find what you are looking for.
            </p>
            <livewire:random-products
            >
            <a href="{{ route('products-index') }}">
                <button
                class="  font-medium w-32  rounded-full text-white px-7 py-2.5  bg-primary hover:bg-primary/90"
                >
                    See All
                </button>
            </a>
        </section>
    </div>
<div class="w-full grid max-w-7xl grid-cols-3 justify-center items-center">
    @include('components.custom.footer-page')
</div>
</x-store-layout>
