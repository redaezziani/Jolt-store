<x-dashboard-layout title="المنتجات" description="صفحة إدارة المنتجات" keywords="المنتجات, إدارة المنتجات, تسوق">
    <x-sheet-bar>
        <livewire:create-products>
    </x-sheet-bar>
    <livewire:make-category>


    <div class="w-full flex justify-between mt-4 items-start flex-wrap">
        <div class="flex flex-col gap-2">
            <h2 class="text-xl font-bold text-slate-700">
                صفحة إدارة المنتجات
            </h2>
            <p class="text-slate-500 text-sm">
                مرحباً بكم في صفحة إدارة المنتجات، يمكنك من هنا إضافة وتعديل وحذف المنتجات بكل سهولة.
            </p>
        </div>

        <div class="flex gap-3 justify-start items-center">
            <x-my-button
            x-data
            x-on:click="$dispatch('category-side-bar-open')"
            class="flex items-center justify-center outline gap-1 py-1">
                <p>
                    إنشاء فئة جديدة
                </p>
            </x-my-button>
            <x-my-button x-data x-on:click="$dispatch('dashboard-sheet-bar-open')"
                class="flex items-center justify-center default gap-1 py-1">
                <p>
                    إنشاء منتج جديد
                </p>
            </x-my-button>
        </div>
    </div>

    <livewire:products-admin-top-cards wire:poll.500ms>

    <livewire:products-table>
</x-dashboard-layout>
