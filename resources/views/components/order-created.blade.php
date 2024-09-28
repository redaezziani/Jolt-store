<div x-data="{ showModal: true }" @order-created.window="showModal = true" class="relative z-10">
    <!-- Modal Background -->
    <div x-show="showModal" class="fixed inset-0  transition-opacity"></div>

    <!-- Modal Content -->
    <div x-show="showModal"
         x-transition
         class="fixed inset-0 z-[30] flex justify-center items-center h-screen overflow-y-auto">
         <div
         class=" w-full lg:max-w-[40rem] min-h-32 border border-slate-400/35 flex bg-white flex-col p-2"
         >

         </div>
    </div>
</div>
