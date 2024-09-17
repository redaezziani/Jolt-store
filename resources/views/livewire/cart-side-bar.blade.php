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

                <svg
                 x-on:click="open = false"
                class="text-neutral-800"
                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icon-tabler-x"
                >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
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
                    class="text-secondary w-full flex bg-[#e11d48] gap-x-2 justify-center items-center"
                >
                    <div
                        wire:loading.class="hidden"
                        wire:target="#checkout"
                        class="flex gap-x-2 justify-center items-center"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"  fill="none">
                        <circle cx="17" cy="18" r="2" stroke="currentColor" stroke-width="1.5" />
                        <circle cx="7" cy="18" r="2" stroke="currentColor" stroke-width="1.5" />
                        <path d="M5 17.9724C3.90328 17.9178 3.2191 17.7546 2.73223 17.2678C2.24536 16.7809 2.08222 16.0967 2.02755 15M9 18H15M19 17.9724C20.0967 17.9178 20.7809 17.7546 21.2678 17.2678C22 16.5355 22 15.357 22 13V11H17.3C16.5555 11 16.1832 11 15.882 10.9021C15.2731 10.7043 14.7957 10.2269 14.5979 9.61803C14.5 9.31677 14.5 8.94451 14.5 8.2C14.5 7.08323 14.5 6.52485 14.3532 6.07295C14.0564 5.15964 13.3404 4.44358 12.4271 4.14683C11.9752 4 11.4168 4 10.3 4H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M2 8H8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M2 11H6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M14.5 6H16.3212C17.7766 6 18.5042 6 19.0964 6.35371C19.6886 6.70742 20.0336 7.34811 20.7236 8.6295L22 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
