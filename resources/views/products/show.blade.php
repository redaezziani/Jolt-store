<x-store-layout
   title="صفحة تفاصيل المنتج {{ $product->name }}"
    description="هذه هي صفحة تفاصيل المنتج {{ $product->name }}. يمكنك العثور على جميع المعلومات حول المنتج هنا."
    keywords="منتج, {{ $product->name }}, تفاصيل, معلومات">
    >
<livewire:add-to-cart wire:poll.keep-alive  :product="$product" />
</x-store-layout>
