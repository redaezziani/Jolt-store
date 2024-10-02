<div x-data="{
    currentDealIndex: 0,
    deals: @js($deals),
    intervalId: null,
    startSlideshow() {
        this.intervalId = setInterval(() => {
            this.nextDeal();
        }, 5000);
    },
    nextDeal() {
        this.currentDealIndex = (this.currentDealIndex + 1) % this.deals.length;
    },
    prevDeal() {
        this.currentDealIndex = (this.currentDealIndex - 1 + this.deals.length) % this.deals.length;
    }
}" x-init="startSlideshow()" class="relative w-full flex h-full  overflow-hidden ">
    <!-- Display deals -->
    <template x-for="(deal, index) in deals" :key="index">
        <div x-show="index === currentDealIndex"
            class="absolute w-full h-full transition-opacity duration-500 ease-in-out"
            :class="{ 'opacity-100': index === currentDealIndex, 'opacity-0': index !== currentDealIndex }">
            <div class="flex absolute bottom-3 gap-3 left-3 z-10">
                <span @click="prevDeal" class=" text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l14 0" />
                        <path d="M15 16l4 -4" />
                        <path d="M15 8l4 4" />
                    </svg>
                </span>
                <span @click="nextDeal"
                    class=" text-white">
                    <svg
                    class=" rotate-180"
                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M15 16l4 -4" />
                    <path d="M15 8l4 4" />
                </svg>
                </span>
            </div>
            <img :src="deal.cover_img" alt="Deal Image" class="w-full z-0 absolute h-full object-cover">
            <span class=" absolute z-[1] inset-0 bg-black/45 h-full w-full "></span>
            <div class="flex z-10 relative w-full p-2 flex-col justify-center items-center h-full ">
                <h2 class="text-xl text-white font-bold mt-4" x-text="deal.name"></h2>
                <p class="text-sm mt-2 text-white/80 line-clamp-3"
                    x-text="deal.description ?? 'No description available'"></p>
                <button
                    class=" mt-5  font-medium w-32  rounded-full text-secondary px-7 py-2  bg-white hover:bg-white/90">
                    {{ __('shop_now') }}
                </button>
            </div>
        </div>
    </template>

    <!-- Navigation Controls -->

</div>
