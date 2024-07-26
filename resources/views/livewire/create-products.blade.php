<div class=" flex justify-start w-full items-start flex-col gap-4">
    <div class="flex gap-1 flex-col justify-start items-start">
        <h1 class=" text-slate-800 text-lg font-bold">
            Create a Product
        </h1>
        <p class=" text-slate-500 lowercase text-sm">
            Create a new Product in your store by fill the inputs bellow.
        </p>
    </div>
    <div class="flex mt-10 flex-col  w-full md:w-[37rem] gap-3">
        <x-label for="name">
            Your Product Name
        </x-label>
        <x-input wire:model="name" type="text" placeholder="" name="" />
        @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex flex-col  w-full md:w-[37rem] gap-3">
        <x-label for="description">
            Your Product description
        </x-label>
        <x-input wire:model="description" type="text"
            class="flex min-h-[60px] w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
            placeholder="" name="" />
        @error('description')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex  items-center flex-wrap md:w-[38rem] justify-start gap-4">
        <div class="mb-4 flex flex-col items-start justify-start gap-2">
            <x-label for="sizes">Your Product Color </x-label>

            <div class="flex gap-x-2 items-center justify-center">
                <div class="flex gap-3">
                    <label class=" cursor-pointer" for="red">
                        <input value="red" wire:model='colors' hidden class=" peer hidden" type="radio"
                            name="color" id="red">
                        <span
                            class=" block size-7 rounded-full bg-red-600 transtio duration-300 peer-checked:ring-red-600 peer-checked:ring-2 peer-checked:ring-offset-2"></span>
                    </label>
                </div>

                <div class="flex gap-3">
                    <label class=" cursor-pointer" for="black">
                        <input value="black" wire:model='colors' hidden class=" peer hidden" type="radio"
                            name="color" id="black">
                        <span
                            class=" block size-7 rounded-full bg-slate-900 transtio duration-300 peer-checked:ring-slate-900 peer-checked:ring-2 peer-checked:ring-offset-2"></span>
                    </label>
                </div>


                <div class="flex gap-3">
                    <label class=" cursor-pointer" for="indigo">
                        <input value="indigo" wire:model='colors' hidden class=" peer hidden" type="radio"
                            name="color" id="indigo">
                        <span
                            class=" block size-7 rounded-full bg-indigo-600 transtio duration-300 peer-checked:ring-indigo-600 peer-checked:ring-2 peer-checked:ring-offset-2"></span>
                    </label>
                </div>

                <div class="flex gap-3">
                    <label class=" cursor-pointer" for="teal">
                        <input value="teal" wire:model='colors' hidden class=" peer hidden" type="radio"
                            name="color" id="teal">
                        <span
                            class=" block size-7 rounded-full bg-teal-600 transtio duration-300 peer-checked:ring-teal-600 peer-checked:ring-2 peer-checked:ring-offset-2"></span>
                    </label>
                </div>

                <div class="flex gap-3">
                    <label class=" cursor-pointer" for="amber">
                        <input value="amber" wire:model='colors' hidden class=" peer hidden" type="radio"
                            name="color" id="amber">
                        <span
                            class=" block size-7 rounded-full bg-amber-500 transtio duration-300 peer-checked:ring-amber-500 peer-checked:ring-2 peer-checked:ring-offset-2"></span>
                    </label>
                </div>
            </div>
            @error('colors')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4 flex flex-col items-start justify-start gap-2">
            <x-label for="quantity">Your Product Sizes </x-label>
            <div class="flex gap-x-2 items-center justify-center">
                <div class="flex gap-3">
                    <label class=" cursor-pointer" for="xs">
                        <input value="xs" wire:model='sizes' hidden class=" peer hidden" type="radio"
                            name="size" id="xs">
                        <div
                            class="  w-10 h-8 flex justify-center items-center rounded-md border border-neutral-400/35   transtio duration-300 peer-checked:ring-primary peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:border-transparent">
                            <span class=" text-sm">xs</span>
                        </div>
                    </label>
                </div>

                <div class="flex gap-3">
                    <label class=" cursor-pointer" for="s">
                        <input value="s" wire:model='sizes' hidden class=" peer hidden" type="radio"
                            name="size" id="s">
                        <div
                            class="  w-10 h-8 flex justify-center items-center rounded-md border border-neutral-400/35   transtio duration-300 peer-checked:ring-primary peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:border-transparent">
                            <span class=" text-sm">s</span>
                        </div>
                    </label>
                </div>

                <div class="flex gap-3">
                    <label class=" cursor-pointer" for="m">
                        <input value="m" wire:model='sizes' hidden class=" peer hidden" type="radio"
                            name="size" id="m">
                        <div
                            class="  w-10 h-8 flex justify-center items-center rounded-md border border-neutral-400/35   transtio duration-300 peer-checked:ring-primary peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:border-transparent">
                            <span class=" text-sm">m</span>
                        </div>
                    </label>
                </div>


                <div class="flex gap-3">
                    <label class=" cursor-pointer" for="l">
                        <input value="l" wire:model='sizes' hidden class=" peer hidden" type="radio"
                            name="size" id="l">
                        <div
                            class="  w-10 h-8 flex justify-center items-center rounded-md border border-neutral-400/35   transtio duration-300 peer-checked:ring-primary peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:border-transparent">
                            <span class=" text-sm">l</span>
                        </div>
                    </label>
                </div>
            </div>
            @error('sizes')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4 flex flex-col items-start justify-start gap-2">
            <x-label for="quantity">Your Product Quantity </x-label>
            <x-input wire:model="quantity" min="0" type="number" id="quantity" placeholder="" />
            @error('quantity')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="flex  items-center flex-wrap md:w-[38rem] justify-start gap-4">
        <div class="mb-4 flex flex-col items-start justify-start gap-2">
            <x-label for="shipping">Your Product Shipping Type </x-label>
            <!-- Select -->
<div class=" w-44 " wire:ignore>
    <select wire:ignore wire:model='shipping' data-hs-select='{
        "placeholder": "Select option...",
        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500",
        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50",
        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
      }' class="hidden">
        <option value="Free">Free Shipping</option>
        <option value="Paid">Paid Shipping</option>
        <option value="Pickup">Pickup</option>
      </select>
</div>
  <!-- End Select -->
            @error('shipping')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
 </div>

        <div class="mb-4 flex flex-col items-start justify-start gap-2">
            <x-label for="quantity">Your Product Price </x-label>
            <x-input wire:model="price" min="0" type="number" id="price" placeholder="" />
            @error('price')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4 flex flex-col items-start justify-start gap-2">
            <x-label for="category_id">Your Product Category </x-label>
            <div class=" w-44 " wire:ignore>
                <select wire:ignore wire:model='category_id' data-hs-select='{
                    "placeholder": "Select option...",
                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500",
                    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50",
                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                  }' class="hidden">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                  </select>
            </div>
            @error('category_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="flex gap-x-2  flex-wrap">
        <div class="mb-4 flex flex-col items-start justify-start gap-2">
            <x-label for="cover_img">Your image cover </x-label>
            <div>
                <label for="dropzone-file"
                    class="flex flex-col items-center w-full max-w-lg p-5 mx-auto mt-2 text-center bg-white border-2 border-gray-300 border-dashed cursor-pointer dark:bg-gray-900 dark:border-gray-700 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-gray-500 dark:text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                    </svg>

                    <h2 class="mt-1 font-medium tracking-wide text-gray-700 dark:text-gray-200">Cover File</h2>

                    <p class="mt-2 text-xs tracking-wide text-gray-500 dark:text-gray-400">Upload or darg & drop your
                        file SVG, PNG, JPG or GIF. </p>

                    <input id="dropzone-file" wire:model='cover_img' type="file" class="hidden" />
                </label>
            </div>
            @error('cover_img')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            @if ($cover_img)
                <img src="{{ $cover_img->temporaryUrl() }}" alt="" class="size-10 object-cover rounded-md">
            @endif
        </div>

        <div class="mb-4 flex flex-col items-start justify-start gap-2">
            <x-label for="prev_imgs">Your prev images </x-label>
            <div>
                <label for="prev_imgs"
                    class="flex flex-col items-center w-full max-w-lg p-5 mx-auto mt-2 text-center bg-white border-2 border-gray-300 border-dashed cursor-pointer dark:bg-gray-900 dark:border-gray-700 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-gray-500 dark:text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                    </svg>

                    <h2 class="mt-1 font-medium tracking-wide text-gray-700 dark:text-gray-200">Cover File</h2>

                    <p class="mt-2 text-xs tracking-wide text-gray-500 dark:text-gray-400">Upload or darg & drop your
                        file SVG, PNG, JPG or GIF. </p>

                    <input multiple id="prev_imgs" wire:model='prev_imgs' type="file" class="hidden" />
                </label>
            </div>
            @error('prev_imgs')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            @if ($prev_imgs)
                <div class="flex gap-2">
                    @foreach ($prev_imgs as $img)
                        <img src="{{ $img->temporaryUrl() }}" alt="" class="size-10 object-cover rounded-md">
                    @endforeach
                </div>
             @endif
        </div>
    </div>
    
    <div class="flex gap-x-4 w-full justify-end items-center">
        <x-button class="outline" wire:click='cancelProduct' wire:ignore>
            Cancel
        </x-button>
        <x-button wire:click='createProduct' wire:loading.attr="disabled" id="submit" class="default">
            <p wire:loading.class=' hidden' wire:target='#submit'>
                Create Product
            </p>
            <div wire:loading wire:target='#submit'
                class="size-4 animate-spin rounded-full border-[2px] border-current border-t-transparent text-white dark:text-white"
                role="status" aria-label="loading">
                <span class="sr-only">Loading...</span>
            </div>
        </x-button>
    </div>
</div>
