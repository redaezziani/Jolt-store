{{-- Product details page lets render the titel and also desc and keywords props base on it  --}}
<x-store-layout title="Detials page for product {{ $product->name }}"
    description="This is the details page for the product {{ $product->name }}. You can find all the information about the product here."
    keywords="product, {{ $product->name }}, details, information">
    >

    <div class="w-full mt-24 gap-6 px-3 md:max-w-[75%] grid grid-cols-1 md:grid-cols-3">
        <div class="col-span-3 flex">
            @include('components.path-link',['product' => $product])
        </div>
        {{-- the product slide image --}}
        @include('components.custom.product.product-slide-image')
        {{-- the product details --}}
        <div class="w-full md:w-2/3 flex gap-2 col-span-1 md:col-span-2  flex-col justify-start items-start">
            <h3 class=" text-neutral-700 text-lg ">
                {{ $product->category->name }}
            </h3>
            <h2 class=" text-neutral-900 uppercase text-xl font-bold">
                {{ $product->name }}
            </h2>
            <p class=" text-neutral-600 mt-4 text-base">
                this is a description for the product , the best product in the world and you will love it.
                just simple text to fill the space and make the product looks good.
                to fill the space and make the product looks good.
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
                                {{--
    --red-600: #dc2626;
    --black-600: #000000;
    --teal-600: #14b8a6;
    --amber-600: #f59e0b;
    --indigo-600: ##4f46e5; lets make the bg and ring --}}
                                  style="
                                  background-color: @if ($color == 'red') #dc2626 @elseif ($color == 'black') #000000 @elseif ($color == 'teal') #14b8a6 @elseif ($color == 'amber') #f59e0b @elseif ($color == 'indigo') #4f46e5 @endif

                                  "
                                    class="  w-8  text-sm h-8 flex justify-center items-center rounded-full border border-neutral-400/35   transtio duration-300 peer-checked:ring-teal-600 peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:border-transparent">

                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- the quantity of the product --}}
            @include('components.custom.product.quantity-input')
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
        @include('components.custom.footer-page')
    </x-store-layout>
