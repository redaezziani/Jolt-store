<section class="grid lg:grid-cols-5 h-2/3  gap-x-3  w-full lg:grid-rows-2 md:max-w-[100%] lg:max-w-[78%] px-3  ">
    <div class=" col-span-2 row-span-3   bg-white border-l border-slate-400/35">

    </div>
    <div class="col-span-3  gap-y-3 row-span-3   grid grid-rows-2 ">
        @foreach ($deals as $deal )
        <span class=" row-span-1 relative overflow-hidden  bg-white w-full">
            <span
            class="absolute z-[1]  inset-0 bg-black/45 h-full w-full ">

            </span>
            <div
            class="flex z-10 relative h-full flex-col gap-2 justify-end items-start p-4"
            >
            @if ($deal->name)
            <h3 class="text-secondary
            text-2xl font-bold">
                {{$deal->name}}
            </h3>
            @endif
            @if ($deal->description)
            <p
            class="text-white/70 line-clamp-2"
            >
                {{$deal->description}}
            </p>
            @endif
            <button class="  font-medium w-32  rounded-full text-secondary px-7 py-2  bg-white hover:bg-white/90">
                     {{ __('view_deal') }}
                </button>
            </div>
            <img
            src="{{$deal->cover_img}}"
             alt="deal" class="w-full h-full object-cover">
        </span>
        @endforeach


    </div>
</section>
