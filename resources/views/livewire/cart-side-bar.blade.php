<div x-data="{ open: false }" x-on:keydown.escape="open = false" x-on:keydown.tab="open = false"
    x-on:keydown.shift.tab="open = false" x-on:side-bar-open.window="open = true" x-on:side-bar-close.window="open = false"
    x-on:click.outside="open = false" x-show="open" style="display: none"
    class="w-full z-[999] overflow-hidden h-screen backdrop-blur-sm bg-black/10 fixed left-0 top-0">
    <div x-on:click="open = false" class="w-full z-[1] overflow-hidden h-screen backdrop-blur-sm bg-black/20"></div>

    <aside x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform -translate-x-full" x-transition:enter-end="transform translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform translate-x-0"
        x-transition:leave-end="transform -translate-x-full"
        class="w-96 z-10 absolute left-0 top-0 h-screen flex bg-white flex-col gap-4 justify-start items-start p-4">
        <div class="w-full flex justify-between items-center">
            <p
            class="text-2xl flex font-semibold text-neutral-800"
            >
                Your Cart
            </p>
           <button
              x-on:click="open = false"
             class="text-neutral-800 border border-neutral-400/35 rounded-md p-1"
           >
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-x">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M18 6l-12 12" />
            <path d="M6 6l12 12" />
        </svg>
           </button>
        </div>
        <div class="flex flex-col mt-4 w-full justify-start items-start gap-3">
            @foreach ($cartItems as $item)
                <div class="w-full flex gap-3  justify-between items-center">
                  <div class="flex w-full justify-start items-start gap-2">
                    <img src="{{ asset('storage/' . $item->product->cover_img) }}" alt="{{ $item->product->name }}"
                    class="w-14 h-14 object-cover rounded-md">
                <div class="flex flex-col justify-start items-start">
                    <h3 class="  text-neutral-600 text-sm font-medium line-clamp-1">
                        {{ $item->product->name }}
                    </h3>
                    <p class="text-neutral-700 text-sm">
                        {{ $item->quantity }} x {{ $item->product->price }} DH
                    </p>
                </div>
                  </div>

                    <button
                    wire:click="removeFromCart({{ $item->id }})"
                    class="text-neutral-800 border border-neutral-400/35 rounded-md p-1"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M18 6l-12 12" />
                            <path d="M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>
    </aside>
</div>
