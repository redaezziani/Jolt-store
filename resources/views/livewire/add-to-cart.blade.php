

    <div class=" w-full mt-24 gap-6 px-3 overflow-x-hidden lg:max-w-[75%] grid  md:grid-cols-3 ">
        <div class="col-span-3 overflow-hidden flex">
            @include('components.show-product-path-link', ['product' => $product])
        </div>

        @include('components.custom.product.product-slide-image')
        <div class="w-full md:w-2/3 flex gap-2 col-span-3 md:col-span-2  flex-col justify-start items-start">
            <a {{-- lets send the slug as query filter= --}} href="{{ route('products-index', ['filter' => $product->category->slug]) }}"
                class=" text-slate-700 -mt-2 underline underline-offset-2 text-lg ">
                {{ $product->category->name }}
            </a>
            <h2 class=" text-slate-900 uppercase text-xl font-bold">
                {{ $product->name }}
            </h2>
            <p class=" text-slate-600 mt-0 text-base">
                {{ $product->description }}
            </p>
            <div class="flex gap-5 flex-wrap">

                <div class="flex flex-col gap-3 justify-start items-start">
                    <p class=" text-slate-800 font-semibold text-lg">
                        الأحجام
                    </p>
                    <div class="w-full flex gap-3 flex-wrap justify-start items-center">
                        {{-- first take the string from sizes and remove the @ bettwen each size then turn it to arry --}}
                        @foreach (explode('@', $product->sizes) as $size)
                            <div class="flex gap-3">
                                <label
                                class=" cursor-pointer"
                                for="size-{{ $size }}"
                                wire:click='setSize("{{ $size }}")'
                                >
                                    <input value="{{ $size }}" aria-label="size" hidden class=" peer hidden"
                                        type="radio"
                                        name="size"
                                        id="size-{{ $size }}"
                                        >
                                    <div
                                     {{---add the ring if he the selectedSize is equal to the size--}}
                                        class="  w-14 px-3 text-sm h-8 flex justify-center items-center rounded-full border border-slate-400/35   transtio duration-300 peer-checked:ring-primary peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:border-transparent">
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
                    <p class=" text-slate-800 font-semibold text-lg">
                        الألوان
                    </p>
                    <div class="w-full flex gap-3 flex-wrap justify-start items-center">
                        {{-- first take the string from sizes and remove the @ bettwen each size then turn it to arry --}}
                        @foreach (explode('@', $product->colors) as $color)
                            <div class="flex gap-3">
                                <label class=" cursor-pointer"
                                for="color-{{ $color }}"
                                wire:click='setColor("{{ $color }}")'
                                 >
                                    <input value="{{ $color }}"
                                     aria-label="color"
                                      hidden class=" peer hidden"
                                        type="radio"
                                         name="color"
                                        id="color-{{ $color }}"
                                        >
                                    <div style="
                                  background-color: @if ($color == 'red') #dc2626 @elseif ($color == 'black') #000000 @elseif ($color == 'teal') #14b8a6 @elseif ($color == 'amber') #f59e0b @elseif ($color == 'indigo') #4f46e5 @endif

                                  "
                                        class="  w-8  text-sm h-8 flex justify-center items-center rounded-full border border-slate-400/35   transtio duration-300 peer-checked:ring-teal-600 peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:border-transparent">


                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- the quantity of the product --}}
            <div class="flex justify-start items-center gap-5 ">

                <div class="flex gap-3">
                    <p class=" text-lg line-through mt-2 text-slate-400">
                        {{ $product->price }}
                    </p>

                    <p class=" text-lg font-bold mt-2 text-primary">
                        @php
                            $discountValue = optional($product->discounts->last())->value;
                        @endphp
                        {{-- lets take it and transform it from string to float --}}
                        @php
                            $discountValue = (float) $discountValue;
                        @endphp
                        {{-- lets take the price and transform it from string to float --}}
                        @php
                            $price = (float) $product->price;
                        @endphp
                        {{-- lets calculate the discount --}}
                        @php
                            $discount = ($discountValue / 100) * $price;
                        @endphp
                        {{-- lets calculate the new price --}}
                        @php
                            $newPrice = $price - $discount;
                        @endphp
                        {{ $newPrice }} درهم مغربي

                    </p>

                </div>
                @include('components.custom.product.quantity-input', ['currentQuantity' => $currentQuantity])
            </div>

            <div class="w-full">
            </div>
            <div class="flex mt-4  gap-2 justify-start items-start">
                <span
                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-md text-xs font-medium border border-gray-200 bg-white  shadow-sm ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"
                        color="#000000" fill="none">
                        <path
                            d="M19.5 17.5C19.5 18.8807 18.3807 20 17 20C15.6193 20 14.5 18.8807 14.5 17.5C14.5 16.1193 15.6193 15 17 15C18.3807 15 19.5 16.1193 19.5 17.5Z"
                            stroke="currentColor" stroke-width="1.5" />
                        <path
                            d="M9.5 17.5C9.5 18.8807 8.38071 20 7 20C5.61929 20 4.5 18.8807 4.5 17.5C4.5 16.1193 5.61929 15 7 15C8.38071 15 9.5 16.1193 9.5 17.5Z"
                            stroke="currentColor" stroke-width="1.5" />
                        <path
                            d="M14.5 17.5H9.5M15 15.5V7C15 5.58579 15 4.87868 14.5607 4.43934C14.1213 4 13.4142 4 12 4H5C3.58579 4 2.87868 4 2.43934 4.43934C2 4.87868 2 5.58579 2 7V15C2 15.9346 2 16.4019 2.20096 16.75C2.33261 16.978 2.52197 17.1674 2.75 17.299C3.09808 17.5 3.56538 17.5 4.5 17.5M15.5 6.5H17.3014C18.1311 6.5 18.5459 6.5 18.8898 6.6947C19.2336 6.8894 19.4471 7.2451 19.8739 7.95651L21.5725 10.7875C21.7849 11.1415 21.8911 11.3186 21.9456 11.5151C22 11.7116 22 11.918 22 12.331V15C22 15.9346 22 16.4019 21.799 16.75C21.6674 16.978 21.478 17.1674 21.25 17.299C20.9019 17.5 20.4346 17.5 19.5 17.5"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    {{ $product->shipping }}
                </span>


            </div>
            <div class="flex w-full md:w-fit gap-x-3 md:gap-x-5 mt-5 pb-3 justify-start items-center">
                <x-button
                id="add-to-cart"
                wire:loading.attr="disabled"
                wire:click="addToCart({{ $product->id }})"
                    class="default font-bold w-1/2 flex gap-x-2 justify-center items-center">
                    <div

                    wire:loading

                    wire:target="#addToCart"
                    class="flex gap-x-2 justify-center items-center">
                        <div
                        class="animate-spin inline-block size-4 border-[2px] border-current border-t-transparent text-amber-200 rounded-full dark:text-amber-200" role="status" aria-label="loading">
                        </div>
                        إضافة إلى السلة ...
                    </div>
                    <div

                    wire:loading.remove
                    wire:target="#addToCart"
                    class="flex gap-x-2 justify-center items-center">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none">
                            <path
                                d="M19.5 11.5C18.4791 8.47991 17.2039 7.5 13.4291 7.5H9.65019C5.74529 7.5 4.23479 8.48796 3.1549 12.2373C2.18223 15.6144 1.6959 17.3029 2.20436 18.6124C2.51576 19.4143 3.06862 20.1097 3.79294 20.6104C5.24007 21.6109 8.98007 22.084 12.5 21.9878"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M7 8V6.36364C7 3.95367 9.01472 2 11.5 2C13.9853 2 16 3.95367 16 6.36364V8" stroke="currentColor"
                                stroke-width="1.5" />
                            <path d="M14 18H22M18 22L18 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M10.5 11H12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        أضف إلى السلة
                    </div>
                </x-button>
                @include('components.check-order')
            </div>
        </div>

        <div class=" w-full mt-5 col-span-3  gap-0  overflow-x-hidden  grid  md:grid-cols-3 ">
            <p class=" text-slate-600 underline underline-offset-2  text-base">
                المنتجات ذات الصلة
            </p>
            <div class="w-full col-span-3 mb-10">
                <livewire:related-products :product="$product" />
            </div>
        </div>
        <div class=" w-full mt-5 col-span-3  gap-0 px-3 overflow-x-hidden  grid  md:grid-cols-3">
            @include('components.custom.footer-page')
        </div>
</div>
