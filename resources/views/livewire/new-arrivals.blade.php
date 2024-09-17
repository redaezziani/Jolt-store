<div class="w-full mt-10">
    {{-- <div class="w-full">
        <div class=" w-44 " wire:ignore>
            <select wire:ignore wire:model.live='filter' data-hs-select='{
                "placeholder": "Select option...",
                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-teal-800",
                "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50",
                "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-teal-900 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
              }' class="hidden">
                @foreach ($categories as $category)
                <option
                 value="{{ $category->slug }}"
                >
                    {{ $category->name }}
                </option>
                @endforeach

              </select>
        </div>
    </div> --}}
    <div class="flex justify-start items-center flex-wrap gap-3">
        @foreach ($categories as $category)
        <button
        wire:click="applyFilter('{{ $category->slug }}')"
        class="rounded-full bg-white border text-neutral-700 cursor-pointer transition-all ease-in-out duration-300 px-3 py-0.5 text-sm
        {{ $filter === $category->slug ? 'border-neutral-400 text-neutral-700 hover:border-neutral-400' : 'border-neutral-400/35 hover:border-neutral-400' }}"
    >
        {{$category->name}}
    </button>
@endforeach
    </div>
    <div class="w-full mt-5 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
        @foreach ($new_arrivals as $product)
            @include('components.custom.product.product-card', ['product' => $product])
        @endforeach
    </div>
    <div class="w-full flex mt-5  justify-between items-center">

        {{-- pagination --}}
        {{ $new_arrivals->links('livewire::simple-tailwind') }}

        {{-- see all --}}
        @if ($new_arrivals->count() > 0)
            <a
            class="text-sm font-semibold text-primary"
            href="{{ route('products-index') }}">
                    عرض الكل
            </a>
        @endif

    </div>
</div>
