<div x-data="{ open: false }" x-on:keydown.escape="open = false" x-on:keydown.tab="open = false"
    x-on:keydown.shift.tab="open = false" x-on:category-side-bar-open.window="open = true"
    x-on:category-side-bar-close.window="open = false" x-on:click.outside="open = false" x-show="open"
    class="w-full z-[999] overflow-hidden h-screen backdrop-blur-sm bg-black/10 fixed left-0 top-0"
    style="display: none;"
    >
    <div x-on:click="open = false" class="w-full z-[1] overflow-hidden h-screen backdrop-blur-sm bg-black/20"></div>

    <aside x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform -translate-x-full" x-transition:enter-end="transform translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform translate-x-0"
        x-transition:leave-end="transform -translate-x-full"
        class="w-96 z-10 absolute left-0 top-0 h-screen flex bg-white flex-col gap-4 justify-start items-start p-4">
        <div class="w-full flex justify-between items-center">
            <p class="text-2xl font-semibold text-neutral-800">
                إنشاء فئة جديدة للمنتجات
            </p>
            <button x-on:click="open = false" class="text-neutral-800 p-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form wire:submit.prevent="createCategory" class="flex w-full flex-col gap-4">
            <div class="flex flex-col gap-1">
                <h1 class="text-slate-800 text-lg font-semibold">
                    إنشاء فئة
                </h1>
                <p class="text-slate-500 text-sm">
                    أنشئ فئة جديدة في متجرك عن طريق ملء الحقول أدناه.
                </p>
            </div>

            <div class="flex flex-col w-full md:w-[27rem] gap-3">
                <x-label for="name">
                    اسم الفئة
                </x-label>
                <x-my-input wire:model="name" type="text" placeholder="" name="name" />
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col w-full md:w-[27rem] gap-3">
                <x-label for="description">
                    وصف الفئة
                </x-label>
                <x-my-input wire:model="description" type="text" placeholder="" name="description" />
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4 flex flex-col gap-2">
                <x-label for="cover_img">صورة الغلاف</x-label>
                <div class="w-full">
                    <label for="cover_img"
                        class="flex flex-col items-center w-full md:max-w-lg p-5 mt-2 text-center bg-white border border-gray-300 cursor-pointer dark:bg-gray-900 dark:border-gray-700 rounded-xl">
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
                        <input id="cover_img" wire:model='cover_img' type="file" class="hidden" />
                    </label>
                </div>
                @error('cover_img')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                @if ($cover_img)
                    <img src="{{ $cover_img->temporaryUrl() }}" alt=""
                        class=" w-full max-96 aspect-[9/8] md:max-w-lg  object-cover rounded-md">
                @endif
            </div>

            <div class="flex gap-x-4 w-full justify-end">
                <x-my-button class="outline w-full">
                    إلغاء
                </x-my-button>
                <x-my-button id="create-category" type="submit" class="default w-full">
                    <p wire:target="createCategory" wire:loading.class="hidden">
                        إنشاء فئة
                    </p>
                    <div wire:target="createCategory" wire:loading
                        class="size-4 animate-spin rounded-full border-[2px] border-current border-t-transparent text-white"
                        role="status" aria-label="loading">
                        <span class="sr-only">جارٍ التحميل...</span>
                    </div>
                </x-my-button>
            </div>
        </form>
    </aside>
</div>
