@props(['product'])
<article
    class="w-full     flex flex-col justify-start items-center relative">
    <span class=" size-9 bg-white absolute z-10 right-1 top-1 flex justify-center items-center rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
        </svg>
    </span>
    <a
    href="{{ route('products-show-details', $product->slug) }}"
    class="relative flex justify-center items-center overflow-hidden rounded-none   w-full aspect-[9/12] h-auto ">
        <img
         src="{{ asset('storage/' . $product->cover_img) }}" alt="{{ $product->name }}"
         class="w-full hover:scale-105 duration-500 transition-all ease-in-out  h-full  object-cover">

    </a>
    <div class="flex w-full  justify-between items-center gap-2">
        <div class=" flex flex-col gap-1 ">
            @if ($product->discounts->count() > 0)
            <span
                class="  overflow-hidden flex justify-start w-fit items-center min-w-32  -bottom-2 bg-primary text-amber-200 line-clamp-1 truncate text-xs font-bold px-2 py-1  left-0">
                {{ $product->discounts->last()->name }} {{ $product->discounts->last()->value }}% off
            </span>
        @endif
            <a href="{{ route('products-show-details', $product->slug) }}" class="  text-slate-600 line-clamp-1">
                {{ $product->name }}
            </a>
            <div class="flex gap-2">
                <p class=" line-through text-slate-600    ">
                    {{ $product->price }}
                </p>

                <p class=" text-teal-700   ">
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
                    {{ $newPrice }} DH

                </p>
            </div>

            <div class=" flex justify-between w-full items-center">
            </div>

        </div>
    </div>
</article>
