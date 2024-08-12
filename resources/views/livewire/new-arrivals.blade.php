<div class="w-full ">
    <div class="w-full mt-10 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($new_arrivals as $product)
           @include('components.custom.product.product-card', ['product' => $product])
        @endforeach
    </div>
    <div class="w-full flex mt-5  justify-between items-start">

        {{-- pagination --}}
        {{ $new_arrivals->links('livewire::simple-tailwind') }}

        {{-- see all --}}
        @if ($new_arrivals->count() > 0)
            <a href="{{ route('products-index') }}">

                See All
            </a>
        @endif

    </div>
</div>
