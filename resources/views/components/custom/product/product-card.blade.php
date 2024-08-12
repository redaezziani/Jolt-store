@props(['product'])
<article
    class="w-full bg-white group-hover:border-neutral-600/60 group p-1 rounded-lg border border-neutral-400/35   flex flex-col justify-start items-center relative">
    <span class=" size-9 bg-white absolute z-10 right-1 top-1 flex justify-center items-center rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
        </svg>
    </span>
    <div class="relative flex justify-center items-center  rounded-md w-full aspect-[9/12] h-auto ">
        <img src="{{ asset('storage/' . $product->cover_img) }}" alt="{{ $product->name }}"
            class="w-full h-full rounded-md object-cover">

        @if ($product->discounts->count() > 0)
            <span
                class=" absolute overflow-hidden flex justify-start items-center min-w-32  -bottom-2 bg-teal-800 text-amber-200 line-clamp-1 truncate text-xs font-bold px-2 py-1  left-0">
                {{ $product->discounts->last()->name }} {{ $product->discounts->last()->value }}% off
            </span>
        @endif

    </div>
    <div class="flex w-full mt-4 justify-between items-center gap-2">
        <div class="flex flex-col">
            <a href="{{ route('products-show-details', $product) }}" class="  text-neutral-900 line-clamp-1">
                {{ $product->name }}
            </a>
            <div class="flex gap-2">
                <p class=" line-through text-neutral-600    ">
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

                <div class=" flex justify-start items-center gap-2">

                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-amber-300 fill-amber-300" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-star">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                        </svg>
                    @endfor
                </div>
            </div>

        </div>
    </div>
</article>
