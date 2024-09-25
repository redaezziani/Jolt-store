<div class="w-full flex flex-col  flex-wrap justify-start items-start md:justify-between md:flex-row">

    <div class=" flex justify-start w-full md:w-1/2 items-start flex-col gap-4">
        <div class="flex gap-1 flex-col justify-start items-start">
            <h1 class=" text-slate-800 text-lg font-bold">
                إنشاء منتج جديد
            </h1>
            <p class=" text-slate-500 lowercase text-sm">
                قم بإنشاء منتج جديد في متجرك بملء المدخلات أدناه.
            </p>
        </div>
        {{--
        the nessary info
        --}}
        <p
        class="text-slate-800 mt-5 text-lg font-bold"
        >
            المعلومات الأساسية
        </p>
        <div class="flex  flex-col  w-full md:w-[37rem] gap-3">
            <x-label for="name">
                اسم المنتج الخاص بك
            </x-label>
            <x-my-input wire:model="name" type="text" placeholder="" name="" />
            @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col  w-full md:w-[37rem] gap-3">
            <x-label for="description">
                وصف المنتج الخاص بك
            </x-label>
            <x-my-input wire:model="description" type="text"
                class="flex min-h-[60px] w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
                placeholder="" name="" />

            @error('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex mt-10 flex-col  w-full md:w-[37rem] gap-3">
            <x-label
           x-data x-on:click="$dispatch('color-side-bar-open')"
            for="color"
            >
                لون المنتج الخاص بك
            </x-label>

            <div class="flex gap-3 flex-wrap justify-start items-center">
                <div x-data="{ color: '#ffffff' }">
                    <!-- Custom color input button -->
                    <button
                        type="button"
                        class="w-8 h-8 rounded-full"
                        x-bind:style="{ backgroundColor: color }"
                        x-on:click="$refs.colorPicker.click()"
                        aria-label="Select a color"
                    ></button>

                    <!-- Hidden native color input -->
                    <input
                        type="color"
                        x-ref="colorPicker"
                        x-on:change="color = $event.target.value; $wire.selectColor(color)"
                        style="display: none;"
                    />
                </div>
                <!-- Display Selected Colors -->
                @foreach ($Colors as $color)
                    @if (!empty($color))
                       <span
                       class=" flex px-4 py-0.5 text-xs border border-slate-400/35 rounded-full"
                       style="color: {{ $color }};"
                       >
                            {{ $color }}
                       </span>
                    @endif
                @endforeach
            </div>
            @error('color')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>


        <div class="flex  items-center flex-wrap md:w-[38rem] justify-start gap-4">

            <div class="mb-4 flex flex-col items-start justify-start gap-2">
                <x-label for="quantity">
                    حجم المنتج الخاص بك
                </x-label>
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


        </div>
        <div class="flex  items-center flex-wrap md:w-[68rem] w-full justify-between md:justify-start gap-4">
            <div class="mb-4 flex flex-col items-start justify-start gap-2">
                <x-select
                    label="اختر نوع الشحن"
                    placeholder="اختر نوع الشحن"
                    :options="[
                        ['name' => 'شحن مجاني', 'id' => 1],
                        ['name' => 'شحن مدفوع', 'id' => 2],
                        ['name' => 'شحن سريع', 'id' => 3],
                    ]"
                    option-label="name"
                    option-value="id"
                    wire:model.defer="shipping"
                />
                <!-- End Select -->
                @error('shipping')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>




            <div class="mb-4 flex flex-col items-start justify-start gap-2">
                <x-select
                    label="اختر الفئة"
                    placeholder="اختر الفئة"
                    :options="$categories"
                    option-label="name"
                    option-value="id"
                    wire:model.defer="category_id"
                />
                @error('category_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 flex flex-col w-full md:w-fit items-start justify-start gap-2">
                <x-label for="quantity">
                    سعر المنتج الخاص بك
                </x-label>
                <x-my-input wire:model="price" min="0" type="number" id="price" placeholder="" />
                @error('price')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 flex flex-col w-full md:w-fit items-start justify-start gap-2">
                <x-label for="quantity">
                    كمية المنتج الخاص بك
                </x-label>
                <x-my-input wire:model="quantity" min="0" type="number" id="quantity" placeholder="" />
                @error('quantity')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>

    </div>
    <div class=" flex gap-x-2 w-full md:w-1/2 mt-[5rem]   flex-wrap">
        {{--
        the images info
        --}}
        <p
        class="text-slate-800  text-lg font-bold"
        >
            صور المنتج
        </p>
        <div class="mb-4 mt-5 flex w-full flex-col  items-start justify-start gap-2">
            <x-label for="images">
                صور المنتج الخاص بك
            </x-label>
            <div class=" w-full">
                <label for="dropzone-file"
                    class="flex flex-col items-center w-full md:max-w-lg  p-5  mt-2 text-center bg-white border border-gray-300  cursor-pointer dark:bg-gray-900 dark:border-gray-700 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-gray-500 dark:text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                    </svg>

                    <h2 class="mt-1 font-medium tracking-wide text-gray-700 dark:text-gray-200">ملف الغلاف</h2>

                    <p class="mt-2 text-xs tracking-wide text-gray-500 dark:text-gray-400">قم بتحميل أو سحب وإفلات ملف
                        SVG أو PNG أو JPG أو GIF الخاص بك. </p>

                    <input id="dropzone-file" wire:model='cover_img' type="file" class="hidden" />
                </label>
            </div>
            @error('cover_img')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            @if ($cover_img)
                <img src="{{ $cover_img->temporaryUrl() }}" alt=""
                    class=" w-full max-96 aspect-[9/10] md:max-w-lg  object-cover rounded-md">
            @endif
        </div>

        <div class="mb-4 flex flex-col w-full items-start justify-start gap-2">
            <x-label for="prev_imgs">
                صور المنتج الخاص بك
            </x-label>
            <div class=" w-full">
                <label for="prev_imgs"
                    class="flex flex-col items-center w-full  md:max-w-lg p-5  mt-2 text-center bg-white border border-gray-300  cursor-pointer dark:bg-gray-900 dark:border-gray-700 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-gray-500 dark:text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                    </svg>

                    <h2 class="mt-1 font-medium tracking-wide text-gray-700 dark:text-gray-200">
                        ملفات الصور
                    </h2>

                    <p class="mt-2 text-xs tracking-wide text-gray-500 dark:text-gray-400">
                        قم بتحميل أو سحب وإفلات ملفات الصور الخاصة بك.
                    </p>

                    <input multiple id="prev_imgs" wire:model='prev_imgs' type="file" class="hidden" />
                </label>
            </div>
            @error('prev_imgs')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            @if ($prev_imgs)
                <div class="flex gap-2 flex-wrap">
                    @foreach ($prev_imgs as $img)
                        <img src="{{ $img->temporaryUrl() }}" alt=""
                            class="size-20 object-cover rounded-md">
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    {{--
        the Discount info : name and value and start and end date
    --}}
    <div class="flex flex-col gap-3 w-full">

    <p
    class="text-slate-800 mt-10 text-lg font-bold"
    >
        المعلومات الخصم
    </p>
    <div class="flex  items-center flex-wrap md:w-[68rem] w-full justify-between md:justify-start gap-4">
        <div class="mb-4 flex flex-col w-full md:w-fit items-start justify-start gap-2">
            <x-label for="discount_name">
                اسم الخصم
            </x-label>
            <x-my-input wire:model="discount_name" type="text" id="discount_name" placeholder="" />
            @error('discount_name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4 flex flex-col w-full md:w-fit items-start justify-start gap-2">
            <x-label for="discount_value">
                قيمة الخصم
            </x-label>
            <x-my-input wire:model="discount_value" type="number" id="discount_value" placeholder="" />
            @error('discount_value')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4 flex flex-col w-full md:w-fit items-start justify-start gap-2">
            <x-label for="discount_start">

            </x-label>
            <x-datetime-picker
            wire:model.live="discount_start"
            label="تاريخ بداية الخصم"
            placeholder="تاريخ بداية الخصم"
            display-format="DD-MM-YYYY HH:mm"
        />
            @error('discount_start')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4 flex flex-col w-full md:w-fit items-start justify-start gap-2">
            <x-label for="discount_end">

            </x-label>
            <x-datetime-picker
            wire:model.live="discount_end"
            label="تاريخ نهاية الخصم"
            placeholder="تاريخ نهاية الخصم"
            display-format="DD-MM-YYYY HH:mm"
        />
            @error('discount_end')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

    <div class="flex gap-x-4 w-full justify-end items-center">
        <x-my-button class="outline w-1/2 md:w-fit" wire:click='cancelProduct' wire:ignore>
            إلغاء الأمر
        </x-my-button>
        <x-my-button wire:click='createProduct' wire:loading.attr="disabled" id="submit"
            class="default w-1/2 md:w-fit"
        >
            <p wire:target='#submit'>
                إنشاء المنتج
            </p>

        </x-my-button>
    </div>
</div>
