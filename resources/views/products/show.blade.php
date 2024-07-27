{{-- Product details page lets render the titel and also desc and keywords props base on it  --}}
<x-store-layout title="Detials page for product {{ $product->name }}"
    description="This is the details page for the product {{ $product->name }}. You can find all the information about the product here."
    keywords="product, {{ $product->name }}, details, information">
    >
    <div class="w-full mt-14 gap-6 max-w-[75%] grid grid-cols-1 md:grid-cols-3">
        <div class=" col-span-1 w-full flex flex-col gap-2 justify-start items-start">
            <div aria-label="product-image"
                class="w-full flex justify-center bg-neutral-200 items-center rounded-none aspect-[9/12] overflow-hidden">
                <img src="{{ asset('storage/' . $product->cover_img) }}" alt="{{ $product->name }}"
                    class="w-full  h-full object-cover">
            </div>

            <div aria-label="prev-images" class="w-full flex flex-wrap gap-4 ">
                {{-- first take the string from prev_imgs and remove the @ bettwen each image then turn it to arry --}}
                @foreach (explode('@', $product->prev_imgs) as $img)
                    <div aria-label="prev-image"
                        class="w-20 flex justify-center items-center rounded-md aspect-square overflow-hidden">
                        <img src="{{ asset('storage/' . $img) }}" alt="{{ $product->name }}"
                            class="w-full mb-4 h-full object-cover">
                    </div>
                @endforeach
            </div>
        </div>
        <div class="w-full flex gap-2 flex-col justify-start items-start">
            <h3 class=" text-neutral-700 text-lg ">
                {{ $product->category->name }}
            </h3>
            <h2 class=" text-neutral-900 uppercase text-xl font-bold">
                {{ $product->name }}
            </h2>
            <p class=" text-neutral-600 text-base">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam asperiores sint, est sapiente
                consequuntur soluta voluptatum saepe exercitationem error nisi quidem quod eveniet temporibus provident,
                ut optio cupiditate reiciendis cumque!
            </p>
            <div class="flex flex-col gap-3 justify-start items-start">
                <p class=" text-neutral-700 text-lg">
                    Sizes
                </p>
                <div class="w-full flex gap-3 flex-wrap justify-start items-center">
                    {{-- first take the string from sizes and remove the @ bettwen each size then turn it to arry --}}
                    @foreach (explode('@', $product->sizes) as $size)
                        <div class="flex gap-3">
                            <label class=" cursor-pointer" for="{{ $size }}">
                                <input value="{{ $size }}" aria-label="size" hidden class=" peer hidden"
                                    type="radio" name="size" id="{{ $size }}">
                                <div
                                    class="  w-14 px-3 text-sm h-8 flex justify-center items-center rounded-full border border-neutral-400/35   transtio duration-300 peer-checked:ring-primary peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:border-transparent">
                                    <span class=" text-sm">
                                        {{ $size }}
                                    </span>
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col gap-3 justify-start items-start">
                <p class=" text-neutral-700 text-lg">
                    Colors
                </p>
                <div class="w-full flex gap-3 flex-wrap justify-start items-center">
                    {{-- first take the string from sizes and remove the @ bettwen each size then turn it to arry --}}
                    @foreach (explode('@', $product->colors) as $color)
                        <div class="flex gap-3">
                            <label class=" cursor-pointer" for="{{ $color }}">
                                <input value="{{ $color }}" aria-label="size" hidden class=" peer hidden"
                                    type="radio" name="size" id="{{ $color }}">
                                <div
                                    class="  w-14 px-3 text-sm h-8 flex justify-center items-center rounded-full border border-neutral-400/35   transtio duration-300 peer-checked:ring-primary peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:border-transparent">
                                    <span class=" text-sm">
                                        {{ $color }}
                                    </span>
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div
                class=" flex w-52 p-0.5  gap-2 justify-between items-center bg-neutral-100 border border-neutral-200/15 rounded-full ">
                <div class="h-10 w-16 rounded-full px-3 bg-white font-bold flex justify-center items-center">
                    +
                </div>
                <input value="1" type="text"
                    class=" bg-transparent text-center w-14  border-none outline-none focus:outline-none focus:ring-0">
                <div
                    class="h-10 w-16 rounded-full px-3 text-white bg-primary font-bold flex justify-center items-center">
                    -
                </div>
            </div>
            <p class=" text-lg mt-2 font-bold text-primary">
                {{ $product->price }} DH
            </p>
            <div class="w-full">

            </div>
            <div class="flex mt-4 flex-col gap-2 justify-start items-start">
                <p class=" text-neutral-700">
                    {{ $product->shipping }}
                </p>
                @if ($product->shipping == 'Paid Shipping')
                    <div
                        class="w-full flex flex-col gap-2 rounded-lg justify-start items-start p-2 h-28 border bg-amber-100 border-amber-500 text-amber-600">
                        <p class=" text-lg font-semibold">
                            Disclaimer !
                        </p>
                        <p class=" text-sm text-amber-500">
                            this product is shipped by the seller and the shipping cost is on the buyer. the shipping
                            cost will be calculated based on the buyer location and the shipping company.
                        </p>
                    </div>
                @endif

            </div>
        </div>
</x-store-layout>
