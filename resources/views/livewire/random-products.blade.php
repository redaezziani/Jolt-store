<div class="w-full mt-10 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach ($randomProducts as $product)
        @include('components.custom.product.product-card', ['product' => $product])
    @endforeach
</div>
