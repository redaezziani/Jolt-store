<article
    class="w-full relative   h-72 rounded-none border border-neutral-400/15 flex justify-center   mt-10 items-center">

    @if ($latestCategory)
        <div class="w-full z-10 h-full  bg-gradient-to-b from-transparent via-black/40  to-black/70 absolute">

        </div>

        <img src="{{ asset('storage/' . $latestCategory->cover_img) }}" alt="{{ $latestCategory->name }}"
            class="w-full absolute z-0 h-full object-cover">
        <div class="flex flex-col p-3 w-[80%]  text-white  gap-3 z-10 justify-start items-start">
            <h3 class=" text-neutral-50 text-3xl font-bold">
                {{ $latestCategory->name }}
            </h3>
            <p class=" text-base text-neutral-50/90 line-clamp-2 lg:line-clamp-4">
                {{ $latestCategory->description }}
            </p>

            <a href="{{ route('categories-show', ['slug' => $latestCategory->slug]) }}">

                <button class="  font-medium w-32  rounded-full text-primary px-7 py-2.5  bg-white hover:bg-white/90">
                    Shop Now
                </button>
            </a>
        </div>
    @endif

</article>
