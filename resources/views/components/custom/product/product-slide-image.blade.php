<div x-data="{ currentImage: '{{ asset('storage/' . $product->cover_img) }}' }"
    x-on:click="$event.target.closest('[aria-label=prev-image]') ? currentImage = $event.target.src : ''"
    class="w-full flex flex-col gap-2 col-span-3 overflow-x-hidden md:col-span-1 justify-start items-start">

    <!-- Main Image -->
    <div aria-label="product-image"
        class="w-full flex justify-center rounded-lg  relative overflow-hidden   bg-slate-300  items-center aspect-[9/12]">
        <span class=" absolute z-10 bg-slate-300 animate-pulse">

        </span>
        <img x-bind:src="currentImage" alt="" class="w-full h-full z-20 object-cover">
    </div>

    <!-- Thumbnail Images -->
    <div aria-label="prev-images" class="w-full flex flex-wrap gap-4">
        @foreach (explode('@', $product->prev_imgs) as $img)
            <div x-on:click="if($event.currentTarget.getAttribute('aria-label') === 'prev-image') currentImage = '{{ asset('storage/' . $img) }}'"
                aria-label="prev-image"
                class="w-20 flex rounded-lg   justify-end  items-end max-h-32 overflow-hidden">
                <img src="{{ asset('storage/' . $img) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
            </div>
        @endforeach
    </div>
</div>
