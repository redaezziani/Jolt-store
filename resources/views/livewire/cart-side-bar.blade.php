<div
    wire:poll.keep-alive
    x-data="{ open: false }"
    x-on:keydown.escape="open = false"
    x-on:keydown.tab="open = false"
    x-on:keydown.shift.tab="open = false"
    x-on:side-bar-open.window="open = true"
    x-on:side-bar-close.window="open = false"
    x-on:click.outside="open = false"
    x-show="open"
    x-cloak
    class="w-full z-[999] overflow-hidden h-screen backdrop-blur-sm bg-black/10 fixed left-0 top-0"
>
    <div
        x-on:click="open = false"
        class="w-full z-[1] overflow-hidden h-screen backdrop-blur-sm bg-black/20"
    ></div>

    <aside
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform -translate-x-full"
        x-transition:enter-end="transform translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="transform translate-x-0"
        x-transition:leave-end="transform -translate-x-full"
        class="w-96 z-10 absolute left-0 top-0 h-screen flex bg-white flex-col gap-4 justify-start items-start p-4"
    >
        <div class="w-full flex justify-between items-center">
            <p class="text-2xl font-semibold text-neutral-800">
                عربة التسوق الخاصة بك
            </p>
            <button
                x-on:click="open = false"
                class="text-neutral-800 p-1"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icon-tabler-x"
                >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex flex-col mt-4 w-full justify-start items-start gap-3">
            @if ($cartItems && count($cartItems) > 0)
                @foreach ($cartItems as $item)
                    <div class="w-full flex gap-3 justify-between items-center">
                        <div class="flex w-full justify-start items-start gap-2">
                            <span class="relative size-14">
                                <span
                                    class="size-4 flex justify-center items-center absolute -top-1 -right-1 rounded-full bg-primary text-secondary p-0.5 cursor-pointer text-xs"
                                    wire:click='removeFromCart({{ $item->id }})'
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="icon icon-tabler icon-tabler-x"
                                    >
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M18 6l-12 12" />
                                        <path d="M6 6l12 12" />
                                    </svg>
                                </span>
                                <img src="{{ asset('storage/' . $item->product->cover_img) }}"
                                    alt="{{ $item->product->name }}" class="w-14 h-14 object-cover rounded-md"
                                >
                            </span>
                            <div class="flex flex-col justify-start items-start">
                                <h3 class="text-neutral-600 text-sm font-medium line-clamp-1">
                                    {{ $item->product->name }}
                                </h3>
                                <p class="text-sm mt-3 text-slate-600">
                                    @php
                                        $discountValue = optional($item->product->discounts->last())->value;
                                        $discountValue = (float) $discountValue;
                                        $price = (float) $item->product->price;
                                        $discount = ($discountValue / 100) * $price;
                                        $newPrice = $price - $discount;
                                    @endphp
                                    <span class="flex gap-0.5 justify-start items-center">
                                        {{ $item->quantity }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" class="icon icon-tabler icon-tabler-x"
                                        >
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M18 6l-12 12" />
                                            <path d="M6 6l12 12" />
                                        </svg>
                                        {{ number_format($newPrice, 2) }}
                                        =
                                        {{ number_format($newPrice * $item->quantity, 2) }}
                                        درهم
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif ($cartItems && count($cartItems) < 1)
                <div class="w-full flex justify-center items-center">
                    <p class="text-lg text-neutral-600">
                        لا يوجد منتجات في العربة
                    </p>
                </div>
            @endif
        </div>
        @if ($cartItems && count($cartItems) > 0)
            <div class="w-full flex gap-2 justify-between items-center">
                <p class="text-slate-600 capitalize">
                    إجمالي السعر للطلب هو : {{ $total }} درهم
                </p>
            </div>
        @endif
        @if ($cartItems && count($cartItems) > 0)
            <div class="flex w-full absolute bottom-0 left-0 bg-white p-2 gap-2 justify-start items-center">
                <x-my-button
                    wire:click='clearCart()'
                    class="outline-none ring-none border-none ghost w-[30%]"
                >
                    تفريغ العربة
                </x-my-button>
                <x-my-button
                    wire:click='checkout()'
                    wire:loading.attr="disabled"
                    id="checkout"
                    class="text-secondary w-full flex bg-[#00e554] gap-x-2 justify-center items-center"
                >
                    <div
                        wire:loading.class="hidden"
                        wire:target="#checkout"
                        class="flex gap-x-2 justify-center items-center"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none">
                            <path d="M19.5 17.5C19.5 18.8807 18.3807 20 17 20C15.6193 20 14.5 18.8807 14.5 17.5C14.5 16.1193 15.6193 15 17 15C18.3807 15 19.5 16.1193 19.5 17.5Z" stroke="currentColor" stroke-width="1.5" />
                            <path d="M9.5 17.5C9.5 18.8807 8.38071 20 7 20C5.61929 20 4.5 18.8807 4.5 17.5C4.5 16.1193 5.61929 15 7 15C8.38071 15 9.5 16.1193 9.5 17.5Z" stroke="currentColor" stroke-width="1.5" />
                            <path d="M14.5 17.5H9.5M19.5 17.5H20.2632C20.4831 17.5 20.5931 17.5 20.6855 17.4885C21.3669 17.4036 21.9036 16.8669 21.9885 16.1855C22 16.0931 22 15.9831 22 15.7632V13C22 9.41015 19.0899 6.5 15.5 6.5H7.08696C7.03745 6.5 6.98967 6.50058 6.9427 6.50162C6.85222 6.51607 6.76578 6.5409 6.68355 6.57493C6.60993 6.60532 6.53966 6.638 6.47343 6.67196C6.14816 6.8833 5.94435 7.22488 5.82316 7.61554C5.80819 7.64735 5.79468 7.67944 5.78167 7.71179L4.5 11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>إتمام الطلب</span>
                    </div>
                    <div
                        wire:loading
                        wire:target="#checkout"
                        class="w-full flex justify-center items-center"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 4V12H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 12L10 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 12L14 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 4L10 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 4L14 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.1156 7.0657L6.55446 10.6164L7.964 11.8552L10.0504 7.79821L8.73376 6.33843L6.1156 7.0657Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M11.6416 12.6935L12.5967 14.0454L13.2811 14.2373L14.3968 12.7873L12.1864 12.3536L11.6416 12.6935Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </x-my-button>
            </div>
        @endif
    </aside>
</div>
