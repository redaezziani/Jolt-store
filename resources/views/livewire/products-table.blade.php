<div
wire:poll.750ms
class="mt-5 flex w-full flex-col">
    {{-- search-bar --}}
    <div class="flex">
        @include('components.custom.product.top-bar')
    </div>
    {{-- create-button --}}
    <div id="delete-model"
        class="invisible fixed left-0 top-0 z-[99] flex h-screen w-full items-center justify-center overflow-hidd bg-black/40">
        <section
            class="flex h-44 w-[30rem] flex-col items-start justify-start gap-2 rounded-md border border-slate-400/30 bg-white p-4">
            <h2 class="font-medium text-red-500">Delete Product </h2>
            <h3 class="text-slate-400">
                Are you sure that you what to delete this product?
            </h3>
            <div class="mt-10 flex w-full items-center justify-end gap-2">
                <x-button class="outline" id="cancle-button">cancel</x-button>
                <x-button wire:click="deleteProduct()" class="default">
                    confirme
                </x-button>
            </div>
        </section>
    </div>
    <div class="-m-1.5 mt-10 overflow-x-auto">
        <div class="inline-block min-w-full p-1.5 align-middle">
            <div class="overflow-hidden rounded-lg border">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase text-gray-500">
                                Product Name
                            </th>

                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase text-gray-500">
                                Product Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase text-gray-500">
                                Product Price
                            </th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase text-gray-500">
                                Product Quantity
                            </th>

                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase text-gray-500">
                                Product Size
                            </th>

                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase text-gray-500">
                                Product Color
                            </th>

                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase text-gray-500">
                                Product Category
                            </th>

                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase text-gray-500">
                                Product Shipping
                            </th>

                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium uppercase text-gray-500">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $product->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap max-w-[26rem] truncate line-clamp-1">
                                    <div class="text-sm text-gray-900">{{ $product->description }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $product->price }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $product->quantity }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ str_replace('@', ' ', $product->sizes) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                   {{ str_replace('@', ' ', $product->colors) }}
                                </td>
                                <td class="px-6 py-4 truncate line-clamp-1 w-52 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $product->category->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                      {{-- {{ $product->shipping }} if =="Paid Shipping" make text-amber-400 else text-teal-400 --}}
                                        @if ($product->shipping == 'Paid Shipping')
                                            <span class="text-amber-500 bg-amber-50 border border-amber-400  px-1 py-0.5 rounded-md">{{ $product->shipping }}</span>
                                        @else
                                            <span class="text-teal-500 bg-teal-50 border border-teal-400  px-1 py-0.5 rounded-md">{{ $product->shipping }}</span>
                                        @endif

                                    </div>
                                </td>
                                <td class="whitespace


                                <td class="whitespace-nowrap px-6 py-4 text-end text-sm font-medium">
                                    <button type="button"
                                        class="inline-flex items-center gap-x-2 rounded-lg border border-transparent text-sm font-semibold text-primary hover:text-primary disabled:pointer-events-none disabled:opacity-50"
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
        <div class="w-[99%] px-3 mt-2">
            {{ $products->links() }}
        </div>
    </div>

</div>
