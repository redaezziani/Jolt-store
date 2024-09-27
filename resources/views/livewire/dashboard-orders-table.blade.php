<div class="mt-5 flex w-full flex-col bg-white p-2 rounded-lg border border-slate-400/35">
    <div class="flex flex-col">
        <h3
        class="text-lg font-bold text-slate-700"
        >
            الطلبات الجديدة
        </h3>
        <p
        class="text-sm text-slate-500"
        >
            هنا يمكنك مشاهدة جميع الطلبات الجديدة التي تم تقديمها من قبل الزبناء
        </p>
    </div>
    <div class="-m-1.5 mt-3 overflow-x-auto">
        <div class="inline-block min-w-full p-1.5 align-middle">
            <div class="overflow-hidden border border-slate-400/35 rounded-lg">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th scope="col" class="px-6 py-5 text-start text-xs font-bold uppercase text-slate-700">
                                الاسم الكامل
                            </th>
                            <th scope="col" class="px-6 py-5 text-start text-xs font-bold uppercase text-slate-700">
                                المجموع
                            </th>
                            <th scope="col" class="px-6 py-5 text-start text-xs font-bold uppercase text-slate-700">
                                الحالة
                            </th>
                            <th scope="col" class="px-6 py-5 text-start text-xs font-bold uppercase text-slate-700">
                                الهاتف
                            </th>
                            <th scope="col" class="px-6 py-5 text-start text-xs font-bold uppercase text-slate-700">
                                المدينة
                            </th>
                            <th scope="col" class="px-6 py-5 text-start text-xs font-bold uppercase text-slate-700">
                                العنوان
                            </th>
                            <th scope="col" class="px-6 py-5 text-start text-xs font-bold uppercase text-slate-700">
                                المنتجات
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach ($orders as $order)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-500">
                                        {{ $order->firstname }} {{ $order->lastname }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-500">
                                        {{ $order->total }} MAD
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-500">
                                       @switch($order->status)
                                           @case('pending')
                                                  <span class="text-amber-500">قيد الانتظار</span>
                                               @break
                                             @case('processing')
                                                    <span class="text-primary">قيد المعالجة</span>
                                                 @break
                                                @case('completed')
                                                        <span class="text-green-500">تم الانجاز</span>
                                                    @break
                                                    @case('cancelled')
                                                        <span class=" text-secondary">تم الالغاء</span>
                                                    @break
                                           @default
                                                <span class="text-amber-500">قيد الانتظار</span>

                                       @endswitch
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-500">
                                        {{ $order->phone }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-500">
                                        {{ $order->city }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-500">
                                        {{ $order->address }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-500">
                                        {{ $order->items->count() }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-[99%] px-3 py-2 mt-2">
            {{ $orders->links('livewire::simple-tailwind') }}
        </div>
    </div>
</div>
