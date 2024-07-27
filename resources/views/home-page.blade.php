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
            <h2
            id="title"

            class=" z-10 relative text-7xl font-semibold text-wrap text-white"
            >
                Jolt Store <span id="b" class=" text-lime-300">.</span>
            </h2>
            <p
            id="description"
            class=" max-w-4xl text-lg  font-semibold text-white z-10 text-center"
            >
                Shop from Jolt Store  and get the 60% off on all products just for this week ,
                don't miss the chance injoy shopping with us with the best quality and price you can find.
            </p>

            <button
            id="shopButton"
            class=" z-10 absolute bottom-10 font-medium rounded-full text-white px-7 py-2.5  bg-lime-400 hover:bg-lime-400"
            >
                Shop Now
            </button>
    </div>
    <div class="relative px-6 flex items-center flex-col justify-start w-full min-h-screen gap-2 overflow-hidden">
        <section class="mt-10 pb-3 flex flex-col gap-4 justify-center items-center md:max-w-[70%]">
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
                <button
                class="  font-medium w-32  rounded-full text-white px-7 py-2.5  bg-primary hover:bg-primary/90"
                >
                    See All
                </button>
        </section>
        <section class="mt-10 pb-3 w-full flex flex-col gap-4 justify-center items-center md:max-w-[70%]">
            <livewire:new-category>
        </section>
    </div>
</x-store-layout>
