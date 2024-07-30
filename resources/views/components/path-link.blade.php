@props(['product'])
<nav class="flex gap-1 justify-start items-center">
    <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-gray-700">Home</a>
    <span class="text-sm text-gray-500">/</span>
    {{--caterory --}}
    <a href="{{ route('products-index') }}" class="text-sm text-gray-500 hover:text-gray-700">Products</a>
    <span class="text-sm text-gray-500">/</span>
    <span class="text-sm text-gray-500">{{ $product->name }}</span>
</nav>
