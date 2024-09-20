<div class="w-full mt-10">

    <div class="flex justify-start items-center flex-wrap gap-3">
        @foreach ($categories as $category)
        <button
        wire:click="applyFilter('{{ $category->slug }}')"
        class="rounded-full bg-white border text-neutral-700 w-[45%] truncate  md:w-fit cursor-pointer transition-all ease-in-out duration-300 px-3 py-0.5 text-sm
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
