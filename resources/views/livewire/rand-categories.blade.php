<div class="w-full mt-10">
    <div class="w-full grid gap-3 lg:grid-cols-3">
          @foreach ($categories as $category)
              <div class="w-full flex border justify-end aspect-[9/10] border-slate-400/35 overflow-hidden relative flex-col gap-2">
                <img
                 src="{{ asset('storage/' . $category->cover_img) }}" alt="{{ $category->name }}"
                 class=" w-full h-full object-cover absolute z-10"
                 >
                 <div class="flex relative z-20 bg-black/40 h-full w-full justify-end p-2 items-start gap-3 flex-col">
                    <h3 class=" text-neutral-50 text-3xl font-bold">
                        {{ $category->name }}
                    </h3>
                    <p class=" text-base text-neutral-50/80 line-clamp-2 lg:line-clamp-2">
                        {{ $category->description }}
                    </p>

                    <a href="{{ url('/products?filter=' . $category->slug) }}">

                        <button class="font-medium group w-32 rounded-full text-primary px-7 py-2.5 bg-white hover:bg-white/90">
                            الذهاب
                            <svg
                            class=" group-hover:mr-2 transition-all ease-in-out duration-500 "
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 12l14 0" />
                                <path d="M5 12l4 4" />
                                <path d="M5 12l4 -4" />
                            </svg>
                        </button>
                    </a>
                 </div>
              </div>
          @endforeach
    </div>
  </div>
