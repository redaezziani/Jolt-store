<div class="w-full mt-10 grid grid-cols-1 lg:grid-cols-4 gap-3">
    <div class="flex flex-col gap-2 justify-start items-start">
        <div class="w-full flex flex-col gap-2 justify-start items-start">
            <h3 class="text-neutral-900 flex gap-x-2 justify-start items-center text-3xl font-bold">
                <span class="w-14 bg-slate-900 h-1"></span>
                تصفية المنتجات
                <span class="w-14 bg-slate-900 h-1"></span>
            </h3>

            <section title="ترتيب حسب السعر" class="w-full flex flex-col gap-3">
                <p class="text-primary font-medium">ترتيب حسب السعر</p>

                @foreach([1 => 'أقل من 50 درهم مغربي', 2 => 'بين 50 و100 درهم مغربي', 3 => 'بين 100 و200 درهم مغربي', 4 => 'أكثر من 200 درهم مغربي'] as $value => $label)
                    <div class="flex gap-2 justify-start items-center relative">
                        <div class="flex gap-3">
                            <label class="cursor-pointer">
                                <input
                                    value="{{ $value }}"
                                    wire:click='applySort({{ $value }})'
                                    class="peer hidden"
                                    type="radio"
                                    name="price"
                                    id="price-{{ $value }}"
                                    {{ $sortPrice == $value ? 'checked' : '' }}
                                >
                                <span class="block size-4 rounded-full ring-primary transition duration-300 peer-checked:bg-primary ring-2 ring-offset-2"></span>
                            </label>
                        </div>
                        <label class="text-slate-700 font-medium" for="price-{{ $value }}">
                            {{ $label }}
                        </label>
                    </div>
                @endforeach

            </section>
            <section
            title="الشحن"
             class="w-full flex flex-col gap-3">
                <p class="text-primary font-medium">الشحن</p>

                @foreach([1 => 'مجاني', 2 => 'مدفوع'] as $value => $label)
                    <div class="flex gap-2 justify-start items-center relative">
                        <div class="flex gap-3">
                            <label class="cursor-pointer">
                                <input
                                    value="{{ $value }}"
                                    wire:click='applySortShipping({{ $value }})'
                                    class="peer hidden"
                                    type="radio"
                                    name="shipping"
                                    id="shipping-{{ $value }}"
                                >
                                <span class="block size-4 rounded-full ring-primary transition duration-300 peer-checked:bg-primary ring-2 ring-offset-2"></span>
                            </label>
                        </div>
                        <label class="text-slate-700 font-medium" for="shipping-{{ $value }}">
                            {{ $label }}
                        </label>
                    </div>
                @endforeach

            </section>

        </div>
    </div>
    <div class="col-span-3">

        <div class="w-full flex justify-between items-start flex-wrap">
            <div wire:ignore class="flex justify-start items-center flex-wrap gap-3">
                @foreach ($categories as $category)
                    <button wire:click="applyFilter('{{ $category->slug }}')"
                            class="rounded-full bg-white border text-slate-700 cursor-pointer transition-all ease-in-out duration-300 px-3 py-0.5 text-sm
            {{ $filter === $category->slug ? 'border-slate-400 text-slate-700 hover:border-slate-400' : 'border-slate-400/35 hover:border-slate-400' }}">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
            <x-my-input wire:model.live.debounce="search" type="text" placeholder="البحث عن المنتجات ..."
                     class="w-full md:w-72 mt-4 md:mt-0"/>
        </div>

        @if ($products->count() > 0)
            <div class="w-full mt-5 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($products as $product)
                    @include('components.custom.product.product-card', ['product' => $product])
                @endforeach
            </div>
        @else
            <div class="w-full mt-5 grid min-h-72 place-items-center">
                <p class="text-slate-500 font-medium">لا توجد منتجات.</p>
            </div>
        @endif

        @if($products->count() > 0)
            <div class="w-full flex mt-5 justify-end items-start">
                {{ $products->links('livewire::simple-tailwind') }}
            </div>
        @endif
    </div>
</div>
