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
        <h2 class=" text-slate-900 mt-5 uppercase text-xl font-bold">
            {{ $product->name }}
        </h2>
        <p class=" text-slate-600 mt-0 text-base">
            {{ $product->description }}
        </p>

        <div class="flex gap-x-1 justify-start items-center">
            @for ($i = 1; $i <= 5; $i++)
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    class="icon icon-tabler icon-tabler-star {{ $i <= $product->rating ? 'text-orange-500' : 'text-slate-400' }}"
                    fill="currentColor">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                </svg>
            @endfor
        </div>

        {{-- if the product have a sizes --}}
        @if ($product->sizes)
        <div class="flex gap-5 mt-2 flex-wrap">
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
                                    class="  w-9 p-1 text-sm h-9 flex justify-center items-center rounded-lg border border-slate-400/35   transtio duration-300 peer-checked:ring-primary peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:border-transparent">
                                    <span class=" text-sm">
                                        {{ $size }}
                                    </span>
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            {{--if the product have a colors --}}
            @if ($product->colors)
            <div class="flex flex-col  gap-3 justify-start items-start">
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
                                  background-color: {{$color}}

                                  "
                                    class="  w-9  text-sm h-9 flex justify-center items-center rounded-full border border-slate-400/35   transtio duration-300 peer-checked:ring-primary peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:border-transparent">

                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        @endif

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
                {{-- if shepping is Paid Shipping well transl it to arabic and do same for Free --}}
                @if ($product->shipping == 'Paid Shipping')
                    الشحن مدفوع
                @else
                    الشحن مجاني
                @endif
            </span>


        </div>
        <div class="flex w-full md:w-fit gap-x-3 md:gap-x-5 mt-5 pb-3 justify-start items-center">
            <x-my-button id="add-to-cart" wire:loading.attr="disabled" wire:click="addToCart({{ $product->id }})"
                class=" default  font-bold w-1/2 flex gap-x-2 justify-center items-center">
               <!-- Spinner displayed during loading -->
               <div wire:loading wire:target="addToCart" class="flex gap-x-2 items-center">
                <svg aria-hidden="true" role="status"
                    class="inline mr-2 w-4 h-4 text-secondary animate-spin dark:text-secondary"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor"></path>
                    <path class=" fill-primary"
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentColor"></path>
                </svg>
                <span>يتم إضافة المنتج إلى السلة ...</span>
            </div>

            <!-- "Add to Cart" text displayed when not loading -->
            <div wire:loading.remove wire:target="addToCart" class="flex gap-x-2 justify-center items-center">

                أضف إلى السلة
            </div>
            </x-my-button>
            @include('components.check-order')
        </div>
    </div>
    <div class=" w-full mt-5 col-span-3  gap-0  overflow-x-hidden justify-start items-start ">
        <div class="flex justify-start items-start flex-col gap-3 max-w-sm w-full">
            <h4 class="text-lg font-semibold mb-4">توزيع تقييمات المنتج</h4>
            <ul class="space-y-2 w-full">
                @foreach($ratings as $rating)
                    @php
                        // Calculate the percentage width based on total number of comments
                        $percentage = ($totalComments > 0) ? ($rating->count / $totalComments) * 100 : 0;
                    @endphp
                    <li class="flex flex-col gap-1 w-full justify-start items-start space-y-4">
                        <span>{{ $rating->rating }} نجوم</span>
                        <span class="relative flex justify-start items-center overflow-hidden w-full bg-slate-100 rounded-full h-2 border border-slate-400/35">
                            <span class="bg-amber-300 h-full" style="width: {{ $percentage }}%;"></span>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>


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
                            <div class="h-9 w-9 overflow-hidden bg-slate-100 border border-slate-400/35 rounded-full">
                                {{-- get the image from the storage/app/public/auth/ --}}
                                <img src="{{ asset('storage/auth/' . 'd-avatar.avif') }}" alt="profile photo"
                                    class="object-cover w-full h-full">
                            </div>
                            <hr class="h-full w-[0.050rem] bg-slate-400/35">
                        </div>

                        <div class="flex  justify-start items-start flex-col">
                            <p class="text-slate-800 font-semibold text-lg">
                                {{ $comment->user->name }}
                            </p>
                            <p title="time" class="text-slate-600 text-base">
                                {{ $comment->created_at->diffForHumans() }}
                            </p>



                            <p class="text-slate-600 mt-3 text-base">
                                {{ $comment->comment_text }}
                            </p>
                            <div class="flex gap-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                                    fill="currentColor" class="w-5 h-5 text-amber-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <p class="text-slate-600 text-base">
                                    {{ $comment->rating }}
                                    /5
                                </p>
                            </div>

                        </div>
                    </article>
                @endforeach
            @endif

        </section>
        {{-- -add comment --}}
        <p class=" text-slate-600 mt-5 underline underline-offset-2  text-base">
            أضف تعليقك
        </p>

        <div class=" relative overflow-hidden max-w-xl pb-5 px-1 mt-5 flex gap-3 justify-start items-start flex-col">
            <textarea wire:model.live.lazydebounce.250ms="commentText" placeholder="أضف تعليقك هنا"
                class="flex w-full rounded-md border border-slate-400/35 bg-transparent px-3 py-2 text-sm text-slate-600 shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary   focus-visible:border-none   disabled:cursor-not-allowed disabled:opacity-50 h-24">
               </textarea>
               <x-my-input
               wire:model.live='rating'
               type="number" placeholder="" />
            <div class="flex gap-x-2  w-full md:w-96">
                <x-my-button id="add-comment(4)" wire:loading.attr="disabled" wire:click="addComment" class="default ">
                    <div wire:loading wire:ignore wire:target="addComment" class="flex">
                        <svg aria-hidden="true" role="status"
                            class="inline mr-2 w-4 h-4 text-secondary animate-spin dark:text-secondary"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor"></path>
                            <path class=" fill-primary"
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentColor"></path>

                        </svg>
                        <span>
                            يتم إضافة تعليقك ...
                        </span>
                    </div>
                    <span wire:loading.attr='hidden' class="text-sm" wire:target="addComment">
                        أضف تعليقك
                    </span>
                </x-my-button>
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
