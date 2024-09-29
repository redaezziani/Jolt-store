<div
wire:poll.2000ms
x-data="{ open: false }" x-on:keydown.escape="open = false" x-on:keydown.tab="open = false"
    x-on:keydown.shift.tab="open = false" x-on:side-bar-open.window="open = true" x-on:side-bar-close.window="open = false"
    x-on:click.outside="open = false" x-show="open" x-cloak
    class="w-full z-[999] overflow-hidden h-screen backdrop-blur-sm bg-black/10 fixed left-0 top-0">
    <div x-on:click="open = false" class="w-full z-[1] overflow-hidden h-screen backdrop-blur-sm bg-black/20"></div>

    <aside x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform -translate-x-full" x-transition:enter-end="transform translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform translate-x-0"
        x-transition:leave-end="transform -translate-x-full"
        class="w-[20rem] md:w-[35rem] z-10 absolute left-0 top-0 h-screen flex bg-white flex-col gap-4 justify-start items-start p-4">
        <div class="w-full flex justify-between items-center">
            <p class="text-2xl font-semibold text-slate-800">
                عربة التسوق الخاصة بك
            </p>
            <svg x-on:click="open = false" class="text-slate-800" xmlns="http://www.w3.org/2000/svg" width="14"
                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-x">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M18 6l-12 12" />
                <path d="M6 6l12 12" />
            </svg>
        </div>
        @if ($cartItems && count($cartItems) > 0)
        <p class="text-base text-secondary underline underline-offset-2 font-semibold"> عدد المنتجات في العربة : {{ count($cartItems) }}</p>
        @endif
        <div class="flex flex-col mt-4 w-full justify-start items-start gap-10 ">
            @if ($cartItems && count($cartItems) > 0)
                @foreach ($cartItems as $item)
                    <div class="w-full flex gap-3 justify-between items-center">
                        <div class="flex w-full justify-start items-start gap-2">
                            <span class="relative size-20">
                                <span
                                    class="size-4 flex justify-center items-center absolute -top-1 -right-1 rounded-full bg-primary text-white p-0.5 cursor-pointer text-xs"
                                    wire:click='removeFromCart({{ $item->id }})'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icon-tabler-x">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M18 6l-12 12" />
                                        <path d="M6 6l12 12" />
                                    </svg>
                                </span>
                                <img src="{{ asset('storage/' . $item->product->cover_img) }}"
                                    alt="{{ $item->product->name }}" class=" w-20 aspect-[9/12] object-cover rounded-none">
                            </span>
                            <div class="flex flex-col justify-start items-start">
                                <h3 class="text-slate-800 text-sm font-medium line-clamp-1">
                                    {{ $item->product->name }}
                                </h3>
                                <p
                                class="text-sm text-slate-600 line-clamp-1 max-w-80"
                                >
                                    {{ $item->product->description }}
                                </p>
                                <p class="text-sm  text-slate-600">
                                    <span class="flex gap-0.5 justify-start items-center">
                                        {{ $item->quantity }} × {{ $item->price }} = {{$item->price * $item->quantity  }} درهم
                                        
                                    </span>
                                </p>

                                {{--lets make a comp that add or update the qua--}}
                                <div class="flex gap-2 justify-start items-center">
                                    <button wire:click='increaseQuantity({{ $item->id }})'
                                        class=" text-base h-6 w-6 border-none flex justify-center items-center rounded-none bg-slate-200 text-slate-700 font-semibold p-1">
                                        +
                                    </button>
                                    <span class="text-xs text-slate-600">
                                        {{ $item->quantity }}
                                    </span>
                                    <button wire:click='decreaseQuantity({{ $item->id }})'
                                        class=" text-base h-6 w-6 border-none flex justify-center items-center rounded-none bg-slate-200 text-slate-700 font-semibold p-1">
                                        -
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif ($cartItems && count($cartItems) < 1)
                <div class="w-full flex justify-center items-center">
                    <p class="text-lg text-slate-600">
                        لا يوجد منتجات في العربة
                    </p>
                </div>
            @endif
        </div>
        @if ($cartItems && count($cartItems) > 0)
            <div class="w-full flex gap-2 mt-5 justify-between items-center">
                <p class="text-slate-600 capitalize">
                    إجمالي السعر للطلب هو : {{ $total }} درهم
                </p>
            </div>
        @endif
        @if ($cartItems && count($cartItems) > 0)
            <div class="flex w-full absolute bottom-0 left-0 bg-white p-2 gap-2 justify-start items-center">
                <x-my-button wire:click='clearCart()' class="outline-none ring-none border-none ghost w-[30%]">
                    تفريغ العربة
                </x-my-button>
                <a
                class=" w-full"
                href="{{ route('order-index') }}">
                <x-my-button  id="checkout"
                    class=" text-white w-full flex bg-primary gap-x-2 justify-center items-center">
                    <div
                        class="flex gap-x-2 justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-truck-delivery">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                            <path d="M3 9l4 0" />
                        </svg>
                        <span>إتمام الطلب</span>
                    </div>

                </x-my-button>
                </a>

            </div>
        @endif
    </aside>
</div>
