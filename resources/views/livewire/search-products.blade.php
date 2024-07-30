<div
    x-data="{ open: false }"
    x-on:keydown.escape="open = false"
    x-on:keydown.tab="open = false"
    x-on:keydown.shift.tab="open = false"
    x-on:search-side-bar-open.window="open = true"
    x-on:search-side-bar-close.window="open = false"
    x-on:click.outside="open = false"
    x-show="open"
    style="display: none"
    class="w-full z-[999] overflow-hidden h-screen backdrop-blur-sm bg-black/10 fixed left-0 top-0"
>
    <div
        x-on:click="open = false"
        class="w-full z-[1] overflow-hidden h-screen backdrop-blur-sm bg-black/20"
    ></div>

    <aside
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform -translate-x-full"
        x-transition:enter-end="transform translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="transform translate-x-0"
        x-transition:leave-end="transform -translate-x-full"
        class="w-96 z-10 absolute left-0 top-0 h-screen flex bg-white flex-col gap-4 justify-start items-start p-4"
    >
        <h1 class="text-2xl font-bold text-neutral-800">
            Search
        </h1>
    <x-input wire:model.live='search' type="text" placeholder="Search for products" class="w-full" />

    <div class="flex flex-col w-full justify-start items-start gap-3">
        @foreach ($products as $product)
            <div class="w-full flex gap-3 justify-start items-center">
                <img src="{{ asset('storage/' . $product->cover_img) }}" alt="{{ $product->name }}"
                    class="w-14 h-14 object-cover rounded-md">
                <div class="flex flex-col justify-start items-start">
                    <h3 class="  text-neutral-600 font-medium line-clamp-1">
                        {{ $product->name }}
                    </h3>
                    <p class="text-neutral-700">
                        {{ $product->description }}
                    </p>
                    <p class="text-primary font-bold">
                        {{ $product->price }} DH
                    </p>
                </div>
            </div>

        @endforeach
    </div>
</aside>
</div>
