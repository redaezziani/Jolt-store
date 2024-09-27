<div
class="mt-5 flex w-full flex-col bg-white p-2 rounded-lg border border-slate-400/35">
    {{-- شريط البحث --}}
    <div class="flex w-full ">
        @include('components.custom.product.top-bar')
    </div>
    <x-delete-all-products-model/>
    <div class="-m-1.5  mt-3  overflow-x-auto">
        <div class="inline-block   min-w-full p-1.5 align-middle">
            <div class="overflow-hidden border border-slate-400/35  rounded-lg ">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>

                            <th scope="col" class="px-6 py-5 text-start text-xs font-bold uppercase text-slate-700">

                            </th>
                            <th scope="col" class="px-6 py-5 text-start text-xs font-bold uppercase text-slate-700">
                                اسم المنتج
                            </th>

                            <th scope="col" class="px-6 py-5 text-start text-xs font-bold uppercase text-slate-700">
                                وصف المنتج
                            </th>
                            <th scope="col" class="px-6 py-5 text-start text-xs font-bold uppercase text-slate-700">
                                سعر
                            </th>
                            <th scope="col" class="px-6 py-5 text-start text-xs font-bold uppercase text-slate-700">
                                كمية
                            </th>

                            <th scope="col" class="px-6 py-5 text-start text-xs font-bold uppercase text-slate-700">
                                حجم المنتج
                            </th>


                            <th scope="col" class="px-6 py-5 text-start text-xs font-bold uppercase text-slate-700">
                                فئة المنتج
                            </th>

                            <th scope="col" class="px-6 py-5 text-start text-xs font-bold uppercase text-slate-700">
                                شحن المنتج
                            </th>

                            <th scope="col" class="px-6 py-5 text-end text-xs font-meboldppercase text-slate-507">
                                الإجراءات
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach ($products as $product)
                            <tr>

                                <td class="px-6 py-4 whitespace-nowrap">
                                 <x-checkbox wire:model="selectedProducts" value="{{ $product->id }}"/>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap max-w-44 truncate">
                                    <div class="text-sm text-slate-500">{{ $product->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap max-w-[22rem] truncate line-clamp-1">
                                    <div class="text-sm text-slate-500">{{ $product->description }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-500">{{ number_format($product->price, 2) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-500">{{ $product->quantity }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-slate-500">
                                        {{ str_replace('@', ' ', $product->sizes) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 truncate line-clamp-1 w-32 whitespace-nowrap">
                                    <div class="text-sm text-slate-500">{{ $product->category->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-500">
                                        @if ($product->shipping == 'Paid Shipping')
                                        <span
                                        class=" py-0.5 gap-x-1  rounded-lg  flex justify-center items-center f "
                                        >
                                        <span
                                        class=" rounded-full bg-slate-300  size-2"
                                        >

                                        </span>
                                        شحن مدفوع
                                        </span>
                                        @else
                                        <span
                                        class=" py-0.5 gap-x-1  rounded-lg  flex justify-center items-center  "
                                        >
                                        <span
                                        class=" rounded-full bg-green-500  size-2"
                                        >

                                        </span>
                                        شحن مجاني
                                        </span>
                                        @endif

                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-end text-sm font-medium">
                                    <button type="button"
                                        class="inline-flex items-center gap-x-2 rounded-lg border border-transparent text-sm font-semibold text-slate-400  disabled:pointer-events-none disabled:opacity-50"
                                        x-data
                                        x-on:click="$dispatch('open-product-delete-model', { productId: {{ $product->id }} })">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                            height="20" fill="none">
                                            <path
                                                d="M19.5 5.5L18.8803 15.5251C18.7219 18.0864 18.6428 19.3671 18.0008 20.2879C17.6833 20.7431 17.2747 21.1273 16.8007 21.416C15.8421 22 14.559 22 11.9927 22C9.42312 22 8.1383 22 7.17905 21.4149C6.7048 21.1257 6.296 20.7408 5.97868 20.2848C5.33688 19.3626 5.25945 18.0801 5.10461 15.5152L4.5 5.5"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path
                                                d="M3 5.5H21M16.0557 5.5L15.3731 4.09173C14.9196 3.15626 14.6928 2.68852 14.3017 2.39681C14.215 2.3321 14.1231 2.27454 14.027 2.2247C13.5939 2 13.0741 2 12.0345 2C10.9688 2 10.436 2 9.99568 2.23412C9.8981 2.28601 9.80498 2.3459 9.71729 2.41317C9.32164 2.7167 9.10063 3.20155 8.65861 4.17126L8.05292 5.5"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M9.5 16.5L9.5 10.5" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" />
                                            <path d="M14.5 16.5L14.5 10.5" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <x-delete-product-model productId="{{ $product->id }}"></x-delete-product-model>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-[99%] px-3 py-2 mt-2">
            {{ $products->links('livewire::simple-tailwind') }}
        </div>
    </div>

</div>
