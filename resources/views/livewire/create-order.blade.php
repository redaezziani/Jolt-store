<div
wire:poll.2000ms
class="w-full grid grid-cols-2 md:grid-cols-4 mt-10 gap-3">
    <div class="flex flex-col gap-2 col-span-2 justify-start items-start">
        {{-- عرض أول عنصر في الطلب --}}
        <div class="w-full">
            <h2 class="text-lg font-semibold text-slate-800">تفاصيل الطلب</h2>
            <p class="text-slate-600">راجع تفاصيل طلبك وقدم المعلومات اللازمة لإكمال عملية الشراء.</p>
            @if ($cartItems && count($cartItems) > 0)

            <div class="flex gap-2 mt-4">
                <img src="{{ asset('storage/' . $cartItems[0]->product->cover_img) }}" alt="صورة المنتج"
                    class="w-20 h-20 object-cover rounded-md">
                <div class="flex flex-col gap-2">
                    <h3 class="text-lg font-semibold text-slate-800">{{ $cartItems[0]->product->name }}</h3>
                    <p class="text-slate-600 line-clamp-2">{{ $cartItems[0]->product->description }}</p>
                    <div class="flex gap-x-2 justify-start items-center">

                    @if ($cartItems[0]->size)
                    <div class="flex gap-x-1 justify-start items-center">

                        <p
                        class=" text-slate-600"
                        >
                        <strong>
                            الحجم :
                        </strong>
                            {{$cartItems[0]->size}}
                        </p>
                    </div>
                    @endif

                    <p class="text-slate-600 ">
                        <strong>
                            السعر:
                        </strong>
                        {{ $cartItems[0]->price }} درهم
                    </p>
                </div>

                </div>
            </div>
            @endif

        </div>
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-slate-600 mb-4">ملخص الطلب</h3>
            <ul class="list-disc pr-5 space-y-2 text-slate-600">
                @foreach ($cartItems as $item)
                    <li>
                        <strong
                        >
                            {{ $item->product->name }} :
                        </strong>
                        <bdi>
                             {{ $item->quantity }} × {{ $item->price }} = {{$item->price * $item->quantity  }} درهم
                        </bdi>
                    </li>
                @endforeach
            </ul>
            <p class="text-base text-secondary underline underline-offset-2 font-semibold mt-4">
                إجمالي الطلب :
                {{ round($total,2) }}
            درهم</p>

        </div>
    </div>
    <div class="col-span-2  bg-white">
        <h2 class="text-lg font-semibold text-slate-800">معلومات الشحن</h2>
        <p class="text-slate-600">راجع تفاصيل طلبك وقدم المعلومات اللازمة لإكمال عملية الشراء.</p>
        <div class="border-r flex flex-col gap-4 pb-3 justify-start items-start border-slate-400/35 px-2">

            <div class="flex w-full gap-2 mt-5  justify-start items-center">
                <div class="w-full flex justify-start items-start gap-3 flex-col lg:w-1/2">
                    <x-label for="firstname" class="text-slate-700">
                        الاسم الأول
                    </x-label>
                    <x-my-input wire:model="firstname" type="text"
                        class="flex w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="  " name="firstname" type="text" />

                    @error('firstname')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full flex justify-start items-start gap-3 flex-col lg:w-1/2">
                    <x-label for="lastname" class="text-slate-700">
                        الاسم الأخير
                    </x-label>
                    <x-my-input wire:model="lastname" type="text"
                        class="flex w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="  " name="lastname" type="text" />
                    @error('lastname')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class=" w-full">
                <x-label for="phone" class="text-slate-700">
                    رقم الهاتف
                </x-label>
                <x-my-input wire:model="phone" type="text"
                    class="flex w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                    placeholder="  " name="phone" type="text" />
                @error('phone')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex w-full gap-2 justify-start items-start">
                <div class="w-full flex justify-start items-start gap-3 flex-col lg:w-1/2">
                    <x-label for="city" class="text-slate-700">
                        المدينة
                    </x-label>
                    <x-my-input wire:model="city" type="text"
                        class="flex w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="  " name="city" type="text" />

                    @error('city')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full flex justify-start items-start gap-3 flex-col lg:w-1/2">
                    <x-label for="zipCode" class="text-slate-700">
                        الرمز البريدي
                    </x-label>
                    <x-my-input wire:model="zipCode" type="text"
                        class="flex w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="   " name="zip_code" type="text" />
                    @error('zipCode')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-4 w-full">
                <x-label for="address" class="text-slate-700">
                    العنوان
                </x-label>
                <x-my-input wire:model="address" as="textarea"
                    class="flex w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                    placeholder=" " name="address" type="text" />
                @error('address')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            @if ($hasPaidShipping)
            <div class="w-full bg-green-400/20 flex justify-center items-center rounded-lg h-16 p-2  gap-x-2">

                <x-label  class="text-green-500">
                    سيتم إضافة 50 درهم كتكلفة شحن لهذا الطلب لأنه أقل من 500 درهم
                </x-label>
            </div>
            @endif

            <div class="flex w-full gap-x-3 ">
                <x-my-button wire:click="PayWithStripe()"
                    class=" outline w-full flex justify-center items-center gap-2">
                    <span>
                        الدفع عبر البطاقة

                    </span>
                    <img src="/stripe.svg" class=" w-7 aspect-auto " />
                </x-my-button>

                <x-my-button class=" outline w-full flex justify-center items-center gap-2">
                    <span>
                        الدفع عبر باي بال
                    </span>
                    <img src="/paypal.svg" class=" w-7 aspect-auto " />
                </x-my-button>
            </div>
            <x-my-button wire:click="PayOnDelivery()" class="w-full default">
                الدفع عند الاستلام
            </x-my-button>
            </form>
        </div>
    </div>
