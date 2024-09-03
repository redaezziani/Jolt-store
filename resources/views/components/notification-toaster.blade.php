<div
    x-data="toastNotification()"
    x-init="init()"
    x-show="show"
    @open-toast-notification.window="
        openToast($event.detail.variant, $event.detail.title, $event.detail.message);
    "
    @close-toast-notification.window="closeToast()"
    style="display: none"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-60 transform -translate-y-40"
    x-transition:enter-end="opacity-100 transform translate-y-3"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-3"
    x-transition:leave-end="opacity-0 transform -translate-y-40"

    class="toast-animation group z-[999] text-slate-500 select-none bg-white w-96 h-20 py-2 rounded-md px-2 flex flex-col justify-start items-start gap-2 fixed top-1 right-2 border cursor-pointer"
>
    <svg x-on:click="show=false"
        class="absolute left-1 top-1 cursor-pointer"
        xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M18 6l-12 12" />
        <path d="M6 6l12 12" />
    </svg>

    <div class="flex justify-start gap-2 items-start w-[90%]">
        <svg class="text-emerald-400" xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24" width="18" height="18" fill="none">
            <path
                d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z"
                stroke="currentColor" stroke-width="1" />
            <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
        <div class="flex truncate line-clamp-1 w-full flex-col justify-start items-start">
            <h1  class="font-bold text-slate-700">
                تمت الإضافة بنجاح
            </h1>
            <p  class="text-sm text-gray-400 max-w-[90%] font-medium line-clamp-2">
                تمت إضافة المنتج إلى السلة بنجاح
            </p>
        </div>
    </div>
</div>

<script>
    function toastNotification() {
        return {
            show: false,
            variant: 'success',
            title: '',
            message: '',
            timeout: null,

            init() {
                this.timeout = null;
            },

            openToast(variant, title, message) {
                this.variant = variant;
                this.title = title;
                this.message = message;
                this.show = true;
                clearTimeout(this.timeout);
                this.timeout = setTimeout(() => this.show = false, 5000);
            },

            closeToast() {
                this.show = false;
                clearTimeout(this.timeout);
            }
        }
    }
</script>
