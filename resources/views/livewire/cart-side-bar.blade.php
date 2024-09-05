<div wire:poll.keep-alive x-data="{ open: false }" x-on:keydown.escape="open = false" x-on:keydown.tab="open = false"
    x-on:keydown.shift.tab="open = false" x-on:side-bar-open.window="open = true" x-on:side-bar-close.window="open = false"
    x-on:click.outside="open = false" x-show="open" style="display: none"
    class="w-full z-[999] overflow-hidden h-screen backdrop-blur-sm bg-black/10 fixed left-0 top-0">
    <div x-on:click="open = false" class="w-full z-[1] overflow-hidden h-screen backdrop-blur-sm bg-black/20"></div>

    <aside x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform -translate-x-full" x-transition:enter-end="transform translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform translate-x-0"
        x-transition:leave-end="transform -translate-x-full"
        class="w-96 z-10 absolute left-0 top-0 h-screen flex bg-white flex-col gap-4 justify-start items-start p-4">
        <div class="w-full flex justify-between items-center">
            <p class="text-2xl flex font-semibold text-neutral-800">
                عربة التسوق الخاصة بك
            </p>

            <button x-on:click="open = false" class="text-neutral-800  p-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex flex-col mt-4 w-full justify-start items-start gap-3">
            @if ($cartItems)
                @foreach ($cartItems as $item)
                    <div class="w-full flex gap-3  justify-between items-center">
                        <div class="flex w-full justify-start items-start gap-2">
                            <img src="{{ asset('storage/' . $item->product->cover_img) }}"
                                alt="{{ $item->product->name }}" class="w-14 h-14 object-cover rounded-md">
                            <div class="flex flex-col justify-start items-start">
                                <h3 class="  text-neutral-600 text-sm font-medium line-clamp-1">
                                    {{ $item->product->name }}
                                </h3>
 <p class=" text-sm  mt-3 text-slate-600">
                                    @php
                                        $discountValue = optional($item->product->discounts->last())->value;
                                    @endphp
                                    {{-- لنأخذها ونحولها من سلسلة إلى عدد عشري --}}
                                    @php
                                        $discountValue = (float) $discountValue;
                                    @endphp
                                    {{-- لنأخذ السعر ونحوله من سلسلة إلى عدد عشري --}}
                                    @php
                                        $price = (float) $item->product->price;
                                    @endphp
                                    {{-- لنحسب الخصم --}}
                                    @php
                                        $discount = ($discountValue / 100) * $price;
                                    @endphp
                                    {{-- لنحسب السعر الجديد --}}
                                    @php
                                        $newPrice = $price - $discount;
                                    @endphp
                                    {{ $newPrice }}
                                     x
                                     {{ $item->quantity }}
                                     =
                                     درهم
                                     {{ $newPrice * $item->quantity }}

                                </p>
                            </div>
                        </div>

                        {{-- <button wire:click="removeFromCart({{ $item->id }})"
                            class="text-neutral-800 border border-neutral-400/35 rounded-md p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M18 6l-12 12" />
                                <path d="M6 6l12 12" />
                            </svg>
                        </button> --}}
                    </div>
                @endforeach
            @endif
        </div>
        @if ($cartItems)
            <div class="w-full flex gap-2 justify-between items-center">
                <div class="w-full flex gap-2 justify-between items-center">
                    <p class=" text-slate-600 capitalize">
                        إجمالي السعر للطلب هو : {{ $total }} درهم
                    </p>
                </div>
            </div>
        @endif

        {{---if empty display the message --}}
        @if ($cartItems)
            <div class="w-full flex justify-center items-center">
                <p class="text-lg text-neutral-600">
                    لا يوجد منتجات في العربة
                </p>
            </div>
        @endif
        @if ($cartItems)
            <div class="flex w-full absolute bottom-0 left-0 bg-white p-2 gap-2 justify-start items-center">
                <x-button wire:click='clearCart()' class=" ghost w-[30%]">
                    تفريغ العربة
                </x-button>
                <x-button
                wire:click='checkout()'
                wire:loading.attr="disabled"
                id="checkout"
                class=" default w-full flex gap-x-2 justify-center items-center ">
                <div
                wire:loading.class="hidden"
                wire:target="#checkout"
                class="flex gap-x-2 justify-center items-center">

                    <svg

                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"
                         fill="none">
                        <path
                            d="M19.5 17.5C19.5 18.8807 18.3807 20 17 20C15.6193 20 14.5 18.8807 14.5 17.5C14.5 16.1193 15.6193 15 17 15C18.3807 15 19.5 16.1193 19.5 17.5Z"
                            stroke="currentColor" stroke-width="1.5" />
                        <path
                            d="M9.5 17.5C9.5 18.8807 8.38071 20 7 20C5.61929 20 4.5 18.8807 4.5 17.5C4.5 16.1193 5.61929 15 7 15C8.38071 15 9.5 16.1193 9.5 17.5Z"
                            stroke="currentColor" stroke-width="1.5" />
                        <path
                            d="M14.5 17.5H9.5M19.5 17.5H20.2632C20.4831 17.5 20.5931 17.5 20.6855 17.4885C21.3669 17.4036 21.9036 16.8669 21.9885 16.1855C22 16.0931 22 15.9831 22 15.7632V13C22 9.41015 19.0899 6.5 15.5 6.5M15 15.5V7C15 5.58579 15 4.87868 14.5607 4.43934C14.1213 4 13.4142 4 12 4H5C3.58579 4 2.87868 4 2.43934 4.43934C2 4.87868 2 5.58579 2 7V15C2 15.9346 2 16.4019 2.20096 16.75C2.33261 16.978 2.52197 17.1674 2.75 17.299C3.09808 17.5 3.56538 17.5 4.5 17.5"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p>
                        تسجيل الطلب
                    </p>
                </div>
                <div
                wire:loading.class=" inline-flex"
                wire:target="#checkout"
                class="animate-spin  hidden size-6 border-[3px] border-current border-t-transparent text-primary rounded-full dark:text-primary" role="status" aria-label="loading">
                    <span class="sr-only">Loading...</span>
                  </div>
                </x-button>
            </div>
        @endif
    </aside>
</div>
