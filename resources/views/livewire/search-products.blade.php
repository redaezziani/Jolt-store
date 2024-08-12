<div x-data="{ open: false }" x-on:keydown.escape="open = false" x-on:keydown.tab="open = false"
    x-on:keydown.shift.tab="open = false" x-on:search-side-bar-open.window="open = true"
    x-on:search-side-bar-close.window="open = false" x-on:click.outside="open = false" x-show="open" style="display: none"
    class="w-full z-[999] overflow-hidden h-screen backdrop-blur-sm bg-black/10 fixed left-0 top-0">
    <div x-on:click="open = false" class="w-full z-[1] overflow-hidden h-screen backdrop-blur-sm bg-black/20"></div>

    <aside x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform -translate-x-full" x-transition:enter-end="transform translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform translate-x-0"
        x-transition:leave-end="transform -translate-x-full"
        class="w-96 z-10 absolute left-0  overflow-y-auto top-0 h-screen flex bg-white flex-col gap-4 justify-start items-start p-4">
        <div class="flex  top-0 left-0 bg-white  w-full gap-3 justify-between items-center">
            <x-input wire:model.live='search' type="text" placeholder="Search for products" class="w-full" />

            <button x-on:click="open = false" class="text-neutral-800 border border-neutral-400/35 rounded-md p-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="flex flex-col mt-10 w-full justify-start items-start gap-3">
            @foreach ($products as $product)
            <div class="flex w-full justify-start items-start gap-2">
                <img src="{{ asset('storage/' . $product->cover_img) }}" alt="{{$product->name }}"
                class="w-16 h-16 object-cover rounded-md">
            <a
             href="{{ route('products-show-details', $product->slug) }}"
            class="flex flex-col justify-start items-start">
                <h3 class="  text-neutral-600 text-sm font-medium line-clamp-1">
                    {{ $product->name }}
                </h3>
                <p class="text-neutral-700 text-sm">
                     {{ $product->price }} DH
                </p>
                {{--if hi have a discount --}}
                @if ($product->discounts->count() > 0)
                <span
                class="  overflow-hidden flex justify-start items-center min-w-32  bg-teal-800 text-amber-200 text-xs font-bold px-2 py-0.5">
                {{ $product->discounts->last()->name }}  {{ $product->discounts->last()->value }}% off
                </span>
                @endif
            </div>
        </a>
            @endforeach
        </div>
    </aside>
</div>
