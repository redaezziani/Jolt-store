<div wire:poll.2000ms x-data="{ open: false }" x-on:keydown.escape="open = false" x-on:keydown.tab="open = false"
    x-on:keydown.shift.tab="open = false" x-on:search-side-bar-open.window="open = true"
    x-on:search-side-bar-close.window="open = false" x-on:click.outside="open = false" x-show="open" x-cloak
    class="w-full z-[999] overflow-hidden h-screen select-none touch-none backdrop-blur-sm bg-black/10 fixed left-0 top-0">
    <div x-on:click="open = false" class="w-full z-[1] overflow-hidden  h-screen backdrop-blur-sm bg-black/20"></div>

    <aside x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform -translate-x-full" x-transition:enter-end="transform translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform translate-x-0"
        x-transition:leave-end="transform -translate-x-full"
        class="w-[22rem] md:w-[35rem] z-10 absolute left-0 top-0 h-screen flex bg-white flex-col gap-4 justify-start items-start p-4">
        <div class="w-full flex justify-between items-center">
            <p class="text-2xl font-semibold text-slate-800">
                البحث عن المنتجات
            </p>
            <svg x-on:click="open = false" class="text-slate-800" xmlns="http://www.w3.org/2000/svg" width="14"
                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-x">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M18 6l-12 12" />
                <path d="M6 6l12 12" />
            </svg>
        </div>
        <div class="flex  top-0 left-0 bg-white mt-5  w-full gap-3 justify-between items-center">
            <x-my-input wire:model.live='search' type="text" placeholder="البحث عن المنتجات" class="w-full" />
        </div>
        <div class="w-full justify-start items-center">
            @if ($products && count($products) > 0)
            <p class="text-base text-secondary underline underline-offset-2 font-semibold"> عدد المنتجات   : {{ count($products) }}</p>
            @endif
        </div>
        <div class="flex flex-col  w-full justify-start items-start gap-3">
            @foreach ($products as $product)
                <div class="flex w-full justify-start items-start gap-2">
                    <img
                    class=" w-20 aspect-[9/12] object-cover rounded-none"
                    src="{{ asset('storage/' . $product->cover_img) }}"
                    alt="{{ $product->name }}"
                    class="w-16 h-16 object-cover rounded-md">
                    <a href="{{ route('products-show-details', $product->slug) }}"
                        class="flex flex-col justify-start items-start">
                        <h3 class="  text-slate-600 text-sm font-medium line-clamp-1">
                            {{ $product->name }}
                        </h3>
                        <p
                                class="text-sm text-slate-600 line-clamp-1 max-w-80"
                                >
                                    {{ $product->description }}
                                </p>
                                <div class="flex gap-2 text-sm">
                                    <p class="line-through text-slate-400">
                                        {{ $product->price }}
                                    </p>
                                    <p class="text-green-400 font-bold">
                                        @php
                                            $discountValue = (float) optional($product->discounts->last())->value;
                                            $price = (float) $product->price;
                                            $discount = ($discountValue / 100) * $price;
                                            $newPrice = $price - $discount;
                                        @endphp
                                        {{ round($newPrice,2) }} {{env('APP_CURRENCY')}}
                                    </p>

                        </div>
                        </p>
                        {{-- if hi have a discount --}}
                        @if ($product->discounts->count() > 0)
                            <span
                                class="  overflow-hidden flex justify-start items-center min-w-32  bg-secondary text-white text-xs font-bold px-2 py-0.5">
                                {{ $product->discounts->last()->name }} {{ $product->discounts->last()->value }}% خصم
                            </span>
                        @endif
                </div>
                </a>
            @endforeach
        </div>

        {{-- if there is no products --}}
        @if ($products == null || $products->count() == 0)
            <div class="flex flex-col w-full justify-center items-center gap-3">

                <img src="{{ asset('storage/empty.png') }}" alt="empty" class="w-32 h-32 object-cover">
                <p class="text-slate-600 text-lg font-bold">
                    لا يوجد منتجات
                </p>
                <p class="text-slate-400 text-sm">

                    لا يوجد منتجات متاحة في الوقت الحالي ، يرجى المحاولة مرة أخرى لاحقًا
                </p>
            </div>
        @endif
        <div class="w-full flex justify-end items-center">
            @if ($products->count() > 0)
            {{ $products->links('livewire::tailwind') }}
        @endif
        </div>

    </aside>
</div>
