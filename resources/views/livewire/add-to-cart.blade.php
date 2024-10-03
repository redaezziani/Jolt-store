<div x-data="cart()" class="w-full mt-24 gap-6 px-3 overflow-x-hidden lg:max-w-[75%] grid md:grid-cols-3">
    <div class="col-span-3 overflow-hidden flex">
        @include('components.show-product-path-link', ['product' => $product])
    </div>

    @include('components.custom.product.product-slide-image')

    <div class="w-full md:w-2/3 flex gap-2 col-span-3 md:col-span-2 flex-col justify-start items-start">
        <div class="flex flex-col justify-start items-start gap-1">
            <a href="{{ route('products-index', ['filter' => $product->category->slug]) }}" class="text-slate-700 -mt-2 text-lg">
                {{ $product->category->name }}
            </a>
            @if ($time)
                <p class="text-sm text-secondary underline underline-offset-2 font-semibold">
                    ينتهي الخصم في: {{ $time }}
                </p>
            @endif
        </div>

        <h2 class="text-slate-900 mt-5 text-xl font-bold uppercase flex items-center">
            {{ $product->name }}
        </h2>
        <p class="text-slate-600 mt-0 text-base">{{ $product->description }}</p>

        <div class="flex gap-x-1 justify-start items-start text-slate-400">
            @for ($i = 1; $i <= 5; $i++)
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" class="icon icon-tabler icon-tabler-star {{ $i <= $product->rating ? 'text-amber-400' : 'text-slate-400' }}" fill="currentColor">
                    <path stroke="none" d="M0 0h24V24H0z" fill="none" />
                    <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                </svg>
            @endfor
            ({{ round($product->rating, 2) }}/5)
            <p>{{ $product->comments->count() }} تعليق</p>
        </div>

        @if ($product->sizes)
            <div class="flex gap-5 mt-2 flex-wrap">
                <div class="flex flex-col gap-3 justify-start items-start">
                    <p class="text-slate-600 font-semibold text-lg">
                        المقاسات
                        @if ($product->quantity < 5)
                            <span class="text-secondary text-sm">(الكمية محدودة)</span>
                        @endif
                    </p>
                    <div class="w-full flex gap-3 max-w-60 flex-wrap justify-start items-center">
                        @foreach (explode('@', $product->sizes) as $size)
                            <label class="cursor-pointer" for="size-{{ $size }}" @click="selectSize('{{ $size }}')">
                                <input value="{{ $size }}" aria-label="size" hidden class="peer hidden" type="radio" name="size" id="size-{{ $size }}">
                                <div class="w-9 p-1 text-sm h-9 flex justify-center items-center rounded-lg border border-slate-400/35 transition duration-300 peer-checked:ring-primary peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:border-transparent"
                                    :class="{ 'ring-primary ring-2 ring-offset-2 border-transparent': selectedSize === '{{ $size }}' }">
                                    <span class="text-sm">{{ $size }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>
                @if ($product->colors)
                    <div class="flex flex-col gap-3 justify-start items-start">
                        <p class="text-slate-600 font-semibold text-lg">الألوان</p>
                        <div class="w-full flex gap-3 flex-wrap justify-start items-center">
                            @foreach (explode('@', $product->colors) as $color)
                                <label class="cursor-pointer" for="color-{{ $color }}" @click="selectColor('{{ $color }}')">
                                    <input value="{{ $color }}" aria-label="color" hidden class="peer hidden" type="radio" name="color" id="color-{{ $color }}">
                                    <div style="background-color: {{ $color }};" class="w-9 h-9 flex justify-center items-center rounded-full border border-slate-400/35 transition duration-300 peer-checked:ring-2 peer-checked:ring-primary peer-checked:ring-offset-2 peer-checked:border-transparent"
                                        :class="{ 'ring-primary ring-2 ring-offset-2 border-transparent': selectedColor === '{{ $color }}' }">
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <div class="flex justify-start items-center gap-5">
            <div class="flex gap-3">
                <p class="text-lg line-through mt-2 text-slate-400">{{ round($product->price, 2) }}</p>
                <p class="text-lg font-bold mt-2 text-green-400">
                    @php
                        $discountValue = optional($product->discounts->last())->value;
                        $discountValue = (float) $discountValue;
                        $price = (float) $product->price;
                        $discount = ($discountValue / 100) * $price;
                        $newPrice = $price - $discount;
                    @endphp
                    {{ round($newPrice, 2) }} {{ env('APP_CURRENCY') }}
                </p>
            </div>
            @include('components.custom.product.quantity-input', ['currentQuantity' => $currentQuantity])
        </div>

        <div class="flex w-full md:w-fit gap-x-3 md:gap-x-5 mt-10 pb-3 justify-start items-center">
            <button @click="addToCart({{ $product->id }}, {{ round($newPrice, 2) }})" class="default font-bold w-1/2 flex gap-x-2 justify-center items-center">
                <div class="flex gap-x-2 justify-center items-center">
                    أضف إلى السلة
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag-plus">
                        <path stroke="none" d="M0 0h24V24H0z" fill="none" />
                        <path d="M12.5 21h-3.926a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304h11.339a2 2 0 0 1 1.977 2.304l-.263 1.708" />
                        <path d="M16 19h6" />
                        <path d="M19 16v6" />
                        <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                    </svg>
                </div>
            </button>
        </div>
    </div>
    <div class=" w-full mt-5 col-span-3  gap-0  overflow-x-hidden justify-start items-start ">
        <div class="flex justify-start items-start flex-col gap-4 max-w-lg w-full py-4 bg-white ">
            <h4 class="text-lg font-semibold text-slate-800">
                توزيع تقييمات المنتج
            </h4>
            @if ($totalComments > 0)
                <ul class="space-y-3 w-full">
                    @foreach ($ratings as $rating)
                        @php
                            $percentage = $totalComments > 0 ? ($rating->count / $totalComments) * 100 : 0;
                        @endphp
                        <li class="flex flex-col gap-2 w-full">
                            <div class="flex justify-between gap-2 items-center w-full">
                                <span class="text-sm font-medium text-slate-600 flex items-center gap-1">
                                    {{ $rating->rating }}
                                </span>
                                <div
                                    class="relative flex justify-start items-center overflow-hidden w-full bg-slate-200 rounded-full h-2">
                                    <span
                                        class="absolute inset-0 bg-gradient-to-r from-amber-400 to-amber-500 rounded-full"
                                        style="width: {{ $percentage }}%;"></span>
                                </div>
                                <span
                                    class="text-sm font-semibold text-slate-500">{{ number_format($percentage, 1) }}%</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-slate-600 text-base">
                    لا يوجد تقييمات حتى الآن
                </p>
            @endif

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
                    @if ($comment->status === 'show' || $comment->user_id === Auth::id())
                        <article
                            class="flex gap-2 gap-x-3  p-2 justify-start items-start
                {{ $comment->status != 'show' && $comment->user_id === Auth::id() ? 'opacity-50 ' : '' }}">
                            <div class="w-full flex justify-between items-center">
                                <div class="flex max-w-[40rem]  justify-start w-full items-start flex-col">
                                    <p class="text-slate-600 font-semibold text-lg">
                                        {{ $comment->user->name }}
                                    </p>
                                    <p title="time" class="text-slate-600 text-sm">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </p>
                                    <p class="text-slate-500 line-clamp-3 mt-2  text-sm">
                                        {{ $comment->comment_text }}
                                    </p>
                                </div>
                                @if ($comment->user_id === Auth::id())
                                    <x-dropdown>
                                        <x-dropdown.item icon="eye" label="تبديل الرؤية"
                                            wire:click="toggleVisibility({{ $comment->id }})" />
                                        <x-dropdown.item icon="trash" label="حذف التعليق"
                                            wire:click="deleteComment({{ $comment->id }})" />
                                    </x-dropdown>
                                @endif
                            </div>
                        </article>
                    @endif
                @endforeach
            @endif
            <span
            x-on:click="$dispatch('comments-bar-open', { productId: {{ $product->id }} })"
            class="text-base text-slate-400 font-semibold underline underline-offset-2 cursor-pointer">
            عرض التعليقات
        </span>
        </section>
        {{-- -add comment --}}
        <p class=" text-slate-600 mt-5 underline underline-offset-2  text-base">
            أضف تعليقك
        </p>

        <div
            class=" relative overflow-hidden max-w-xl pb-5 px-1 pt-2 mt-5 flex gap-3 justify-start items-start flex-col">
            <textarea wire:model.live.lazydebounce.250ms="commentText" placeholder="أضف تعليقك هنا"
                class="flex w-full rounded-md border border-slate-400/35 bg-transparent px-3 py-2 text-sm text-slate-600 shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary   focus-visible:border-none   disabled:cursor-not-allowed disabled:opacity-50 h-24">
            </textarea>
            <div class="flex gap-x-2 justify-start items-start">

                <div x-data="{ currentVal: @entangle('rating') }" class="flex items-center gap-1">
                    <label for="oneStar" class="cursor-pointer transition hover:scale-125">
                        <span class="sr-only">One star</span>
                        <input x-model="currentVal" id="oneStar" type="radio" class="sr-only" name="rating"
                            value="1">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                            fill="currentColor" class="w-5 h-5"
                            :class="currentVal >= 1 ? 'text-amber-400' : 'text-slate-400 dark:text-neutral-300'">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </label>

                    <label for="twoStars" class="cursor-pointer transition hover:scale-125">
                        <span class="sr-only">Two stars</span>
                        <input x-model="currentVal" id="twoStars" type="radio" class="sr-only" name="rating"
                            value="2">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                            fill="currentColor" class="w-5 h-5"
                            :class="currentVal >= 2 ? 'text-amber-400' : 'text-slate-400 dark:text-neutral-300'">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </label>

                    <label for="threeStars" class="cursor-pointer transition hover:scale-125">
                        <span class="sr-only">Three stars</span>
                        <input x-model="currentVal" id="threeStars" type="radio" class="sr-only" name="rating"
                            value="3">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                            fill="currentColor" class="w-5 h-5"
                            :class="currentVal >= 3 ? 'text-amber-400' : 'text-slate-400 dark:text-neutral-300'">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </label>

                    <label for="fourStars" class="cursor-pointer transition hover:scale-125">
                        <span class="sr-only">Four stars</span>
                        <input x-model="currentVal" id="fourStars" type="radio" class="sr-only" name="rating"
                            value="4">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                            fill="currentColor" class="w-5 h-5"
                            :class="currentVal >= 4 ? 'text-amber-400' : 'text-slate-400 dark:text-neutral-300'">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </label>

                    <label for="fiveStars" class="cursor-pointer transition hover:scale-125">
                        <span class="sr-only">Five stars</span>
                        <input x-model="currentVal" id="fiveStars" type="radio" class="sr-only" name="rating"
                            value="5">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                            fill="currentColor" class="w-5 h-5"
                            :class="currentVal >= 5 ? 'text-amber-400' : 'text-slate-400 dark:text-neutral-300'">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </label>
                </div>
                <p class="text-slate-400 text-sm">
                    (قم بتقييم المنتج)
                </p>
            </div>
            <div class="flex gap-x-2  w-full md:w-96">
                <x-my-button id="add-comment(4)" wire:loading.attr="disabled" wire:click="addComment"
                    class="default ">
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
            <livewire:related-products
              lazy
             :product="$product" />
        </div>
    </div>

    <div class=" w-full mt-5 col-span-3  gap-0 px-3 overflow-x-hidden  grid  md:grid-cols-3">
        @include('components.custom.footer-page')
    </div>
</div>
<script>
    function cart() {
        return {
            selectedSize: null,
            selectedColor: null,
            cartItems: JSON.parse(localStorage.getItem('cartItems')) || [],

            addToCart(productId, productPrice) {
                if (!this.selectedSize || !this.selectedColor) {
                    alert('Please select a size and color.');
                    return;
                }

                let existingItem = this.cartItems.find(item =>
                    item.id === productId &&
                    item.size === this.selectedSize &&
                    item.color === this.selectedColor
                );

                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    this.cartItems.push({
                        id: productId,
                        price: productPrice,
                        size: this.selectedSize,
                        color: this.selectedColor,
                        quantity: 1
                    });
                }

                localStorage.setItem('cartItems', JSON.stringify(this.cartItems));
                alert('Product added to cart.');
            },

            selectSize(size) {
                this.selectedSize = size;
            },

            selectColor(color) {
                this.selectedColor = color;
            }
        }
    }
</script>
