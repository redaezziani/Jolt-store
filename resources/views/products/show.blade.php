{{-- Product details page lets render the titel and also desc and keywords props base on it  --}}
<x-store-layout title="Detials page for product {{ $product->name }}"
    description="This is the details page for the product {{ $product->name }}. You can find all the information about the product here."
    keywords="product, {{ $product->name }}, details, information">
    >

    <div class="w-full mt-24 gap-6 px-3 md:max-w-[75%] grid grid-cols-1 md:grid-cols-3">
        <div class="col-span-3 flex">
            @include('components.path-link', ['product' => $product])
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
                {{ $product->description }}
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
                                <div {{--
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
            <div class="flex mt-4  gap-2 justify-start items-start">
                <span
                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-md text-xs font-medium border border-gray-200 bg-white  shadow-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-white">
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
                {{-- prodcut have a discount --}}
                @if ($product->discounts->count() > 0)
                    <span
                        class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-md text-xs font-medium border border-gray-200 bg-white  shadow-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"
                            color="#000000" fill="none">
                            <path
                                d="M7.83152 21.3478L7.31312 20.6576C6.85764 20.0511 5.89044 20.1 5.50569 20.7488C4.96572 21.6595 3.5 21.2966 3.5 20.2523V3.74775C3.5 2.7034 4.96572 2.3405 5.50569 3.25115C5.89044 3.90003 6.85764 3.94888 7.31312 3.34244L7.83152 2.65222C8.48467 1.78259 9.84866 1.78259 10.5018 2.65222L10.5833 2.76076C11.2764 3.68348 12.7236 3.68348 13.4167 2.76076L13.4982 2.65222C14.1513 1.78259 15.5153 1.78259 16.1685 2.65222L16.6869 3.34244C17.1424 3.94888 18.1096 3.90003 18.4943 3.25115C19.0343 2.3405 20.5 2.7034 20.5 3.74774V20.2523C20.5 21.2966 19.0343 21.6595 18.4943 20.7488C18.1096 20.1 17.1424 20.0511 16.6869 20.6576L16.1685 21.3478C15.5153 22.2174 14.1513 22.2174 13.4982 21.3478L13.4167 21.2392C12.7236 20.3165 11.2764 20.3165 10.5833 21.2392L10.5018 21.3478C9.84866 22.2174 8.48467 22.2174 7.83152 21.3478Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                            <path d="M15 9L9 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M15 15H14.991M9.00897 9H9" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        {{ $product->discounts->last()->name }} {{ $product->discounts->last()->value }}% off
                    </span>
                @endif

            </div>
            <div class="flex gap-x-5 mt-5 justify-start items-center">
                <livewire:add-to-cart :product="$product" />
                @include('components.check-order')
            </div>
        </div>
</x-store-layout>
