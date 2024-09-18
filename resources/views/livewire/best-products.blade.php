<div class="w-full mt-10">
    <div class="w-full mt-5 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
        @foreach ($best_products as $product)
            @include('components.custom.product.product-card', ['product' => $product])
        @endforeach
    </div>
    <div class="w-full flex mt-5  justify-between items-center">
        {{ $best_products->links('livewire::simple-tailwind') }}
        @if ($best_products->count() > 0)
            <a
            class="text-sm font-semibold text-primary"
            href="{{ route('products-index') }}">
                    عرض الكل
            </a>
        @endif
    </div>
</div>
