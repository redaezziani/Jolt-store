
<div
x-data="{ currentImage: '{{ asset('storage/' . $product->cover_img) }}' }"
x-on:click="currentImage = $event.target.src"

class=" col-span-1  w-full flex flex-col gap-2 justify-start items-start">
    <div aria-label="product-image"
        class="w-full flex justify-center border border-neutral-400/35 bg-neutral-200 items-center rounded-none aspect-[9/12] overflow-hidden">
        <img
            x-bind:src="currentImage"
            alt="{{ $product->name }}"
         class="w-full  h-full object-cover"
        >
    </div>

    <div aria-label="prev-images" class="w-full flex flex-wrap gap-4 ">
        @foreach (explode('@', $product->prev_imgs) as $img)
            <div
            x-on:click="currentImage = '{{ asset('storage/' . $img) }}'"

            aria-label="prev-image"
                class="w-20 flex border border-neutral-400/35 justify-end items-end rounded-none  max-h-32 overflow-hidden">
                <img src="{{ asset('storage/' . $img) }}" alt="{{ $product->name }}"
                    class="w-full  h-full object-cover">
            </div>
        @endforeach
    </div>
</div>
