<div class="w-full mt-10 grid grid-cols-1 lg:grid-cols-4 gap-3">


    <div class="flex flex-col gap-2 justify-start items-start">

        <div class="w-full flex flex-col gap-2 justify-start items-start">
            <h3 class="text-neutral-900 flex gap-x-2 justify-start items-center text-3xl font-bold">
                <span class="w-14 bg-slate-900 h-1"></span>
                تصفية المنتجات
                <span class="w-14 bg-slate-900 h-1"></span>
            </h3>
            <div class="flex justify-end">
                <span
                class="hover:text-green-400  group transition-all ease-in-out duration-300 text-slate-400 font-medium cursor-pointer flex gap-1 justify-start items-center"
                wire:click="resetFilters">
                    <svg
                    class=" transition-all  group-hover:ml-2"
                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-restore">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3.06 13a9 9 0 1 0 .49 -4.087" />
                        <path d="M3 4.001v5h5" />
                        <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                    </svg>
                    إعادة تعيين  الفلاتر
                </span>
            </div>
            <section title="ترتيب حسب السعر" class="w-full flex flex-col gap-3">
                <p class="text-primary font-medium">ترتيب حسب السعر</p>
                {{-- TODO: Add wire:fix all --}}
                @foreach ([
        5 => 'عرض الكل',
        1 => 'أقل من 50 درهم',
        2 => 'من 50 إلى 100 درهم',
        3 => 'من 100 إلى 200 درهم',
        4 => 'أكثر من 200 درهم',
    ] as $value => $label)
                    <div class="flex gap-2 justify-start items-center relative">
                        <div class="flex gap-3">
                            <label class="cursor-pointer">
                                <input
                                x-data="{ selectedPrice: @entangle('selectedPrice').defer }"
                                value="{{ $value }}" wire:click='applySort({{ $value }})'
                                    class="peer hidden" type="radio" name="price" id="price-{{ $value }}"
                                    {{ $sortPrice == $value ? 'checked' : '' }}>
                                <span
                                    class="block size-4 rounded-full ring-primary transition duration-300 peer-checked:bg-primary ring-2 ring-offset-2 {{ $sortPrice == $value ? 'bg-primary' : '' }}">
                                </span>
                            </label>
                        </div>
                        <label class="text-slate-700 font-medium" for="price-{{ $value }}">
                            {{ $label }}
                        </label>
                    </div>
                @endforeach

            </section>
            <section title="الشحن" class="w-full flex flex-col gap-3">
                <p class="text-primary font-medium">الشحن</p>
                @foreach ([
        3 => 'الكل',
        1 => 'مجاني',
        2 => 'مدفوع',
    ] as $value => $label)
                    <div class="flex gap-2 justify-start items-center relative">
                        <div class="flex gap-3">
                            <label class="cursor-pointer">
                                <input
                                x-data="{ selectedShipping: @entangle('selectedShipping').defer }"
                                value="{{ $value }}" wire:click='applySortShipping({{ $value }})'
                                    class="peer hidden" type="radio" name="shipping"
                                    id="shipping-{{ $value }}">
                                <span
                                    class="block size-4 rounded-full ring-primary transition duration-300 peer-checked:bg-primary ring-2 ring-offset-2 {{ $selectedShipping == $value ? 'bg-primary' : '' }}">
                                </span>
                            </label>
                        </div>
                        <label class="text-slate-700 font-medium" for="shipping-{{ $value }}">
                            {{ $label }}
                        </label>
                    </div>
                @endforeach

            </section>
            <div aria-label="تصفية المنتجات" class="divide-y  divide-slate-200">
                <!-- Accordion item -->
                <div x-data="{ expanded: false }" class="">
                    <h2>
                        <span id="sizes-section" type="button"
                            class="flex items-center justify-between w-full text-left font-semibold py-2"
                            @click="expanded = !expanded" :aria-expanded="expanded" aria-controls="sizes-section">
                            <p class="text-primary font-medium">
                                اختر المقاسات
                            </p>
                            <svg class="transform origin-center transition duration-200 ease-out text-slate-600"
                                :class="{ '!rotate-180 !text-primary': expanded }" xmlns="http://www.w3.org/2000/svg"
                                width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 9l6 6l6 -6" />
                            </svg>
                        </span>
                    </h2>
                    <div id="faqs-text-01" role="region" aria-label="sizes-section"
                        class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                        :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                        <div
                            class="w-full overflow-hidden py-2 flex gap-3 max-w-80 flex-wrap justify-start items-center">
                            @foreach ($sizes as $size)
                                <div class="flex gap-3">
                                    <label class="cursor-pointer" for="size-{{ $size }}"
                                        wire:click='applySizeFilter("{{ $size }}")'>
                                        <input
                                        x-data="{ selectedSize: @entangle('selectedSize').defer }"
                                        value="{{ $size }}" aria-label="size" hidden class="peer hidden"
                                            type="radio" name="size" id="size-{{ $size }}">
                                        <div
                                            class="w-9 p-1 text-sm h-9 flex justify-center items-center rounded-lg border border-slate-400/35 transition duration-300
                                        peer-checked:ring-primary peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:border-transparent {{ $selectedSize == $size ? 'ring-primary ring-2 ring-offset-2 border-transparent' : '' }}">
                                            <span class="text-sm">
                                                {{ $size }}
                                            </span>
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="divide-y divide-slate-200">
                <!-- Accordion item -->
                <div aria-label="تصفية المنتجات" x-data="{ expanded: false }" class="py-2">
                    <h2>
                        <span id="colors-section" type="button"
                            class="flex items-center justify-between w-full text-left font-semibold py-2"
                            @click="expanded = !expanded" :aria-expanded="expanded" aria-controls="colors-section">
                            <p class="text-primary font-medium">
                                اختر اللون
                            </p>

                            <svg class="transform origin-center transition duration-200 ease-out text-slate-600"
                                :class="{ '!rotate-180 !text-primary': expanded }" xmlns="http://www.w3.org/2000/svg"
                                width="18" height="18" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 9l6 6l6 -6" />
                            </svg>

                        </span>
                    </h2>
                    <div id="colors-section" role="region" aria-labelledby="sizes-section"
                        class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                        :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                        <div
                            class="w-full flex  overflow-hidden py-2 gap-3 max-w-80 flex-wrap justify-start items-center">
                            @foreach ($colors as $color)
                                <div class="flex gap-3">
                                    <label class="cursor-pointer" for="color-{{ $color }}"
                                        wire:click='applyColorFilter("{{ $color }}")'>
                                        <input
                                          x-data="{ selectedColor: @entangle('selectedColor').defer }"
                                         value="{{ $color }}"
                                         aria-label="color" hidden
                                            class="peer hidden" type="radio" name="color"
                                            id="color-{{ $color }}">
                                        <div style="background-color: {{ $color }};"
                                            class="w-9 h-9 flex justify-center items-center rounded-full border border-slate-400/35 transition duration-300
                                peer-checked:ring-2 peer-checked:ring-primary peer-checked:ring-offset-2 peer-checked:border-transparent
                                  {{ $selectedColor == $color ? 'ring-primary ring-2 ring-offset-2 border-transparent' : '' }}">
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-3">

        <div class=" w-full flex justify-start flex-col gap-3 items-start flex-wrap">
            <x-my-input wire:model.live.debounce="search" type="text" placeholder="البحث عن المنتجات ..."
            class=" md:w-72 flex h-10 w-full  border border-slate-400/35 bg-transparent px-3 py-2 text-sm text-slate-600  transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium  focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary   focus-visible:border-none   disabled:cursor-not-allowed disabled:opacity-50 !important mt-4 md:mt-0" />
            <div wire:ignore class="flex w-full justify-start items-center flex-wrap gap-3">
                @foreach ($categories as $category)
                    <button
                    x-data="{ selectedCategory: @entangle('selectedCategory').defer }"
                    wire:click="applyFilter('{{ $category->slug }}')"
                        class="rounded-full bg-white border  cursor-pointer transition-all ease-in-out duration-300 px-3 py-0.5 text-sm {{ $selectedCategory == $category->slug ? 'border-primary text-primary' : 'border-slate-400' }}">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>

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

            <div
            x-intersect.full="$wire.loadMore()"

            class="w-full flex mt-5 h-7  justify-center items-center">
                <svg

                      aria-hidden="true" role="status"
                      {{-- {{ $isLoading ? 'block' : 'hidden' }} --}}
                        class="inline mr-2 w-5 h-5 text-white animate-spin dark:text-white "
                         viewBox="0 0 100 101 "
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor"></path>
                        <path class=" fill-slate-400"
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentColor"></path>
                    </svg>
            </div>
    </div>
</div>
