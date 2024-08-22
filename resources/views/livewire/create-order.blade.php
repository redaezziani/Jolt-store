<div class="w-full grid grid-cols-4 gap-3">
    <div class="flex flex-col gap-2 col-span-2 justify-start items-start">
        {{--lets display the first order item --}}
        <div class="w-full">
            <h2 class="text-lg font-semibold text-slate-800">Order Details</h2>
            <div class="flex gap-2 mt-4">
                <img src="{{ asset('storage/' . $cartItems[0]->product->cover_img) }}" alt="product image"
                    class="w-20 h-20 object-cover rounded-md">
                <div class="flex flex-col gap-2">
                    <h3 class="text-lg font-semibold text-slate-800">{{ $cartItems[0]->product->name }}</h3>
                    <p class="text-slate
                    -600">{{ $cartItems[0]->product->description }}</p>
                    <p class="text-lg font-semibold text-slate-800">{{ $cartItems[0]->product->price }} DH</p>
                </div>
            </div>
        </div>
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-slate-800 mb-4">Order Summary</h3>
            <ul class="list-disc pl-5 space-y-2 text-slate-600">
                @foreach($cartItems as $item)
                    <li>{{ $item->product->name }} - {{ $item->quantity }} x {{ $item->product->price }} DH</li>
                @endforeach
            </ul>
            <p class="text-lg font-semibold text-slate-800 mt-4">Total: {{ $total }} DH</p>
        </div>
    </div>
    <div class=" col-span-2 p-2 bg-white   mt-5">
        <h2 class="text-lg font-semibold text-slate-800">Shipping Information</h2>
            <p class="text-slate-600">Review your order details and provide the necessary information to complete the purchase.</p>
        <form
        class="border-l border-slate-400/35 px-2"
        wire:submit.prevent="createOrder">

            <div class=" flex  w-full gap-2 mt-3  justify-start items-center">
                <div class="w-1/2">
                    <x-label for="phone" class="text-slate-700">
                        First Name
                    </x-label>
                    <x-input wire:model="firstName" type="text"
                        class="flex  w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="Enter your first name" name="firstName" type="text" />

                    @error('firstName')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-1/2">
                    <x-label for="phone" class="text-slate-700">
                        Last Name
                    </x-label>
                    <x-input wire:model="lastName" type="text"
                        class="flex  w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="Enter your last name" name="lastName" type="text" />
                    @error('lastName')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mt-4">
                <x-label for="phone" class="text-slate-700">
                    Phone Number
                </x-label>
                <x-input wire:model="phone" type="text"
                    class="flex  w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                    placeholder="Enter your phone number" name="phone" type="text" />
                @error('phone')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class=" flex  w-full gap-2  justify-start items-center">
                <div class="w-1/2">
                    <x-label for="city" class="text-slate-700">
                        City
                    </x-label>
                    <x-input wire:model="city" type="text"
                        class="flex  w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="Enter your city name" name="city" type="text" />

                    @error('city')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-1/2">
                    <x-label for="zib_code" class="text-slate-700">
                        Zip Code
                    </x-label>
                    <x-input wire:model="zib_code" type="text"
                        class="flex  w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="Enter your city zib code" name="zib_code" type="text" />
                    @error('zib_code')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-4">
                <x-label for="address" class="text-slate-700">
                    Address
                </x-label>
                <x-input wire:model="address" as="textarea"
                    class="flex  w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                    placeholder="Enter your address" name="address" type="text" />
                @error('address')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-3 px-4 bg-primary text-white font-semibold rounded-md shadow-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Place Order
            </button>
        </form>
    </div>
</div>
