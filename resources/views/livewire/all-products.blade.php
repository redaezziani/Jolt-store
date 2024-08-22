<div class="w-full mt-10 grid grid-cols-1 lg:grid-cols-4 gap-3">
    <div class="flex flex-col gap-2 justify-start items-start">
        <div class="w-full flex flex-col gap-2 justify-start items-start">
            <h3
                class=" text-neutral-900 flex gap-x-2 justify-start items-center text-3xl font-bold"
            >
                <span class=" w-14 bg-slate-900 h-1"></span>
               Filter Products
                <span class=" w-14 bg-slate-900 h-1"></span>
            </h3>
           
        </div>
    </div>
    <div class=" col-span-3">

    <div class="w-full flex justify-between  items-start flex-wrap">
        <div
        wire:ignore
        class="flex justify-start items-center flex-wrap gap-3">
            @foreach ($categories as $category)
                <button wire:click="applyFilter('{{ $category->slug }}')"
                    class="rounded-full bg-white border text-slate-700 cursor-pointer transition-all ease-in-out duration-300 px-3 py-0.5 text-sm
            {{ $filter === $category->slug ? 'border-slate-400 text-slate-700 hover:border-slate-400' : 'border-slate-400/35 hover:border-slate-400' }}">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>
        <x-input wire:model.live.debounce="search" type="text" placeholder="Search for products ..."
            class=" w-full md:w-72 mt-4 md:mt-0" />
    </div>
    @if ($products->count()>0)
    <div class="w-full mt-5 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($products as $product)
        @include('components.custom.product.product-card', ['product' => $product])
        @endforeach
    </div>
    @else
    <div class="w-full mt-5 grid min-h-72 place-items-center">
        <p
        class=" text-slate-500 font-medium"
        >
            no products fount .
        </p>
    </div>
    @endif
    <div class="w-full flex mt-5  justify-end items-start">
        {{ $products->links('livewire::simple-tailwind') }}
    </div>
    </div>
</div>
