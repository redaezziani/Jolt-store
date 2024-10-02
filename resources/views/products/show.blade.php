<x-store-layout title="صفحة تفاصيل المنتج {{ $product->name }}"
    description="هذه هي صفحة تفاصيل المنتج {{ $product->name }}. يمكنك العثور على جميع المعلومات حول المنتج هنا."
    keywords="منتج, {{ $product->name }}, تفاصيل, معلومات">
    >
    <livewire:comments-sheet>
    <livewire:add-to-cart :product="$product" />
</x-store-layout>
