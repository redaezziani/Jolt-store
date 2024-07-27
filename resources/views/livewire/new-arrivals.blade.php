<div class="w-full mt-10 grid grid-cols-2 md:grid-cols-4 gap-4">
    @foreach ($new_arrivals as $product)
        <article class="w-full flex flex-col justify-start items-center relative">
            <span class=" size-9 bg-white absolute z-10 right-1 top-1 flex justify-center items-center rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                </svg>
            </span>
            <div
                class="relative flex justify-center items-center  rounded-md w-full aspect-[9/12] h-auto overflow-hidden">
                <img src="{{ asset('storage/' . $product->cover_img) }}" alt="{{ $product->name }}"
                    class="w-full h-full object-cover">
            </div>
            <div class="flex w-full mt-2 justify-between items-center gap-2">
                <div class="flex flex-col">
                    <a href="{{ route('products-show-details', $product) }}" class="  text-neutral-700">
                        {{ $product->name }}
                    </a>
                    <p class="   text-neutral-600">
                        {{ $product->price }} DH
                    </p>
                    <p class=" text-neutral-500">
                        {{ $product->category->name }}
                    </p>
                </div>
            </div>
        </article>
    @endforeach
</div>
