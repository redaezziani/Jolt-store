<div class="w-full bg-primary flex-col gap-2  min-h-80 flex justify-center items-center">
    <div class="flex">
        <input wire:model.lazy="email"
               class="bg-white rounded-none lg:w-96"
               type="email"
               placeholder="أدخل بريدك الإلكتروني" />

        <button wire:click="subscribe"
                class="bg-slate-900 text-white rounded-none px-3 py-2 h-full">
            اشتراك
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l14 0" />
                <path d="M5 12l4 4" />
                <path d="M5 12l4 -4" />
            </svg>
        </button>
    </div>
    @error('email')
    <span class="text-red-500">{{ $message }}</span>
@enderror
</div>
