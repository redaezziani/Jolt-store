<x-store-layout
    title="{{ __('hero_title') }}"
    description="{{ __('hero_description') }}"
    keywords="متجر {{env('APP_NAME')}} تسوق، خصم 60٪، منتجات، جودة، سعر">
    <div
        class="w-full h-96 lg:h-[90vh] bg-slate-200  flex justify-center items-center overflow-hidden relative ">
        <livewire:deals-display>
    </div>
    <div class="relative flex items-center flex-col justify-start w-full min-h-screen gap-2 overflow-hidden">
        <section class="mt-10 pb-3 px-3 flex flex-col gap-4 justify-center items-center md:max-w-[100%] lg:max-w-[70%]">
            <h3 class="text-neutral-900 flex gap-x-2 justify-start items-center text-3xl font-bold">
                <span class="w-14 bg-slate-900 h-1"></span>
                {{ __('new_arrivals') }}
                <span class="w-14 bg-slate-900 h-1"></span>
            </h3>
            <p class="text-base text-center max-w-3xl text-neutral-800">
                {{ __('discover_new_trends') }}
            </p>
            <livewire:new-arrivals />
        </section>
        <section
            class="mt-5 pb-3 w-full flex flex-col gap-4 justify-center items-center md:max-w-[100%] lg:max-w-[70%]">
            <livewire:new-category />
        </section>

        <section class="mt-10 pb-3 px-3 flex flex-col gap-4 justify-center items-center md:max-w-[100%] lg:max-w-[70%]">
            <h3 class="text-neutral-900 flex gap-x-2 justify-start items-center text-3xl font-bold">
                <span class="w-14 bg-slate-900 h-1"></span>
                {{ __('random_products') }}
                <span class="w-14 bg-slate-900 h-1"></span>
            </h3>

            <p class="text-base text-center max-w-3xl text-neutral-800">
                {{ __('check_out_random_products') }}
            </p>
            <livewire:random-products />
            <a href="{{ route('products-index') }}"></a>
        </section>

        <section class="mt-10 pb-3 px-3 flex flex-col gap-4 justify-center items-center md:max-w-[100%] lg:max-w-[70%]">
            <h3 class="text-neutral-900 flex gap-x-2 justify-start items-center text-3xl font-bold">
                <span class="w-14 bg-slate-900 h-1"></span>
                {{ __('random_categories') }}
                <span class="w-14 bg-slate-900 h-1"></span>
            </h3>

            <p class="text-base text-center max-w-3xl text-neutral-800">
                {{ __('check_out_random_categories') }}
            </p>
            <livewire:rand-categories />
            <a href="{{ route('products-index') }}"></a>
        </section>

        <section class="mt-10 pb-3 px-3 flex flex-col gap-4 justify-center items-center md:max-w-[100%] lg:max-w-[70%]">
            <h3 class="text-neutral-900 flex gap-x-2 justify-start items-center text-3xl font-bold">
                <span class="w-14 bg-slate-900 h-1"></span>
                {{ __('best_products') }}
                <span class="w-14 bg-slate-900 h-1"></span>
            </h3>

            <p class="text-base text-center max-w-3xl text-neutral-800">
                {{ __('check_out_best_products') }}
            </p>
            <livewire:best-products />
            <a href="{{ route('products-index') }}"></a>
        </section>

        <section
            class="mt-10 w-full pb-3 lg:px-3 flex flex-col gap-4 justify-center items-center md:max-w-[100%] lg:max-w-[70%]">
            <h3 class="text-neutral-900 flex gap-x-2 justify-start items-center text-3xl font-bold">
                <span class="w-14 bg-slate-900 h-1"></span>
                {{ __('subscribe') }}
                <span class="w-14 bg-slate-900 h-1"></span>
            </h3>

            <p class="text-base text-center max-w-3xl text-neutral-800">
                {{ __('subscribe_newsletter') }}
            </p>
            <livewire:sub-to-store>
            <a href="{{ route('products-index') }}"></a>
        </section>
    </div>
    <div class="w-full grid md:max-w-7xl grid-cols-1 md:grid-cols-3 justify-center items-center">
        @include('components.custom.footer-page')
    </div>
</x-store-layout>
