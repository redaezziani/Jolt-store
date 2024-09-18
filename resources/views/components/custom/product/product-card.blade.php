<article
    x-data="{
        currentImageIndex: 0,
        images: {{ json_encode(array_merge([asset('storage/' . $product->cover_img)], array_map(fn($img) => asset('storage/' . $img), explode('@', $product->prev_imgs)))) }}
    }"
    class="w-full flex flex-col justify-start items-center relative"
>
    <div
        {{-- href="{{ route('products-show-details', $product->slug) }}" --}}
        class="relative select-none flex justify-center items-center overflow-hidden rounded-md w-full aspect-[9/12] h-auto"
    >
        <span class="absolute z-10 top-3 right-3 flex justify-center items-center">
            <span class="rounded-full cursor-pointer" @click="currentImageIndex = (currentImageIndex + 1) % images.length">
                <svg
                    class="text-slate-500 transition-all border-e-slate-300 ease-in-out hover:scale-105"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="icon icon-tabler icon-tabler-chevron-right"
                >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 6l6 6l-6 6" />
                </svg>
            </span>
            <span class="rounded-full cursor-pointer transition-all border-e-slate-300 ease-in-out hover:scale-105" @click="currentImageIndex = (currentImageIndex - 1 + images.length) % images.length">
                <svg
                    class="text-slate-500 transition-all border-e-slate-300 ease-in-out hover:scale-105"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="icon icon-tabler icon-tabler-chevron-left"
                >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" />
                </svg>
            </span>
        </span>
        <img
            :src="images[currentImageIndex]"
            alt="{{ $product->name }}"
            class="w-full hover:scale-105 duration-500 transition-all ease-in-out h-full object-cover"
        >
    </div>
    <div class="flex w-full justify-between items-center gap-2">
        <div class="flex flex-col gap-1 mt-2">
            @if ($product->discounts->count() > 0)
                <span class="overflow-hidden flex justify-start rounded-sm w-fit items-center min-w-32 bg-[#2563eb] text-secondary line-clamp-1 truncate text-xs font-bold px-2 py-1">
                    {{ $product->discounts->last()->name }} {{ $product->discounts->last()->value }}% off
                    <hr class="border-dashed border-r w-10 rotate-90 border-white h-full">
                </span>
            @endif
            <a href="{{ route('products-show-details', $product->slug) }}" class="mt-2 text-slate-800 line-clamp-1">
                {{ $product->name }}
            </a>
            <p class="text-slate-600 text-sm line-clamp-2">
                {{ $product->description }}
            </p>
            <div class="flex gap-2">
                <p class="line-through text-slate-600">
                    {{ $product->price }}
                </p>
                <p class="text-primary">
                    @php
                        $discountValue = (float) optional($product->discounts->last())->value;
                        $price = (float) $product->price;
                        $discount = ($discountValue / 100) * $price;
                        $newPrice = $price - $discount;
                    @endphp
                    {{ $newPrice }} DH
                </p>
            </div>
        </div>
    </div>
</article>
