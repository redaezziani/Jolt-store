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
                            <label class=" cursor-pointer" for="size-{{ $size }}"
                                wire:click='setSize("{{ $size }}")'>
                                <input value="{{ $size }}" aria-label="size" hidden class=" peer hidden"
                                    type="radio" name="size" id="size-{{ $size }}">
                                <div {{-- -add the ring if he the selectedSize is equal to the size --}}
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
                            <label class=" cursor-pointer" for="color-{{ $color }}"
                                wire:click='setColor("{{ $color }}")'>
                                <input value="{{ $color }}" aria-label="color" hidden class=" peer hidden"
                                    type="radio" name="color" id="color-{{ $color }}">
                                <div style="
                                  background-color: @if ($color == 'red') #dc2626 @elseif ($color == 'black') #000000 @elseif ($color == 'teal') #14b8a6 @elseif ($color == 'amber') #f59e0b @elseif ($color == 'indigo') #4f46e5 @endif

                                  "
                                    class="  w-8  text-sm h-8 flex justify-center items-center rounded-full border border-slate-400/35   transtio duration-300 peer-checked:ring-primary peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:border-transparent">


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
            <x-button id="add-to-cart" wire:loading.attr="disabled" wire:click="addToCart({{ $product->id }})"
                class="default font-bold w-1/2 flex gap-x-2 justify-center items-center">
                <div wire:loading wire:target="#addToCart" class="flex gap-x-2 justify-center items-center">
                    <div class="animate-spin inline-block size-4 border-[2px] border-current border-t-transparent text-amber-200 rounded-full dark:text-amber-200"
                        role="status" aria-label="loading">
                    </div>
                    إضافة إلى السلة ...
                </div>
                <div wire:loading.remove wire:target="#addToCart" class="flex gap-x-2 justify-center items-center">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"
                        fill="none">
                        <path
                            d="M19.5 11.5C18.4791 8.47991 17.2039 7.5 13.4291 7.5H9.65019C5.74529 7.5 4.23479 8.48796 3.1549 12.2373C2.18223 15.6144 1.6959 17.3029 2.20436 18.6124C2.51576 19.4143 3.06862 20.1097 3.79294 20.6104C5.24007 21.6109 8.98007 22.084 12.5 21.9878"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M7 8V6.36364C7 3.95367 9.01472 2 11.5 2C13.9853 2 16 3.95367 16 6.36364V8"
                            stroke="currentColor" stroke-width="1.5" />
                        <path d="M14 18H22M18 22L18 14" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M10.5 11H12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                    أضف إلى السلة
                </div>
            </x-button>
            @include('components.check-order')
        </div>
    </div>
    <div class=" w-full mt-5 col-span-3  gap-0  overflow-x-hidden justify-start items-start ">
        {{-- comments section --}}
        <p class=" text-slate-600 underline underline-offset-2  text-base">
            التعليقات والآراء
        </p>

        <section class="flex w-full mt-5 justify-start items-start flex-col gap-3">
            @if ($comments->isEmpty())
                <p class=" text-slate-600 text-base">
                    لا يوجد تعليقات حتى الآن
                </p>
            @else
                @foreach ($comments as $comment)
                    <article class="flex gap-2 gap-x-3 max-w-xl justify-start items-start">
                        <div class="flex h-full flex-col gap-2 justify-start items-center">
                            <div class="h-8 w-8 overflow-hidden bg-slate-100 border border-slate-400/35 rounded-full">
                                <!-- Avatar -->
                            </div>
                            <hr class="h-full w-[0.050rem] bg-slate-400/35">
                        </div>

                        <div class="flex gap-1 justify-start items-start flex-col">
                            <p class="text-slate-800 font-semibold text-lg">
                                {{ $comment->user->name }}
                            </p>
                            <p title="time" class="text-slate-600 text-base">
                                {{ $comment->created_at->diffForHumans() }}
                            </p>

                            <div class="flex gap-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                                    fill="currentColor" class="w-5 h-5 text-amber-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <p
                                class="text-slate-600 text-base"
                                >
                                {{ $comment->rating }}
                                /5
                                </p>
                            </div>

                            <p class="text-slate-600 mt-3 text-base">
                                {{ $comment->comment_text }}
                            </p>

                            <button wire:click="deleteComment({{ $comment->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24" color="#000000" fill="none">
                                    <path
                                        d="M19.5 5.5L18.8803 15.5251C18.7219 18.0864 18.6428 19.3671 18.0008 20.2879C17.6833 20.7431 17.2747 21.1273 16.8007 21.416C15.8421 22 14.559 22 11.9927 22C9.42312 22 8.1383 22 7.17905 21.4149C6.7048 21.1257 6.296 20.7408 5.97868 20.2848C5.33688 19.3626 5.25945 18.0801 5.10461 15.5152L4.5 5.5"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M3 5.5H21M16.0557 5.5L15.3731 4.09173C14.9196 3.15626 14.6928 2.68852 14.3017 2.39681C14.215 2.3321 14.1231 2.27454 14.027 2.2247C13.5939 2 13.0741 2 12.0345 2C10.9688 2 10.436 2 9.99568 2.23412C9.8981 2.28601 9.80498 2.3459 9.71729 2.41317C9.32164 2.7167 9.10063 3.20155 8.65861 4.17126L8.05292 5.5"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M9.5 16.5L9.5 10.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path d="M14.5 16.5L14.5 10.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                    </article>
                @endforeach
            @endif

        </section>
        {{-- -add comment --}}
        <p class=" text-slate-600 mt-5 underline underline-offset-2  text-base">
            أضف تعليقك
        </p>

        <div class=" relative overflow-hidden max-w-xl mt-5 flex gap-3 justify-start items-start flex-col">
            <textarea wire:model.live.lazydebounce.250ms="commentText" placeholder="أضف تعليقك هنا"
                class="flex w-full rounded-md border border-slate-400/35 bg-transparent px-3 py-2 text-sm text-slate-600 shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary   focus-visible:border-none   disabled:cursor-not-allowed disabled:opacity-50 h-24">
               </textarea>

            <div class="flex gap-x-2 w-full md:w-96">
                <x-button wire:loading.attr="disabled" wire:click="addComment" class="default">
                    أضف تعليقك
                </x-button>
            </div>
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
