<div class="flex items-center justify-start gap-x-2">
    @guest
   <a href="{{ route('login') }}" >
    <x-button class="outline">
        sign-in
    </x-button>

   </a>
    <a href="{{ route('register') }}" >
        <x-button class="default">
            sign-up
        </x-button>
    </a>
    @else

    <div x-data="{ isOpen: false }" class="relative inline-block">
        <!-- Dropdown toggle button -->
        <button @click="isOpen = !isOpen" class="relative flex justify-start items-center gap-x-2 z-10  p-2 text-gray-700 ">
            <span
            class=" overflow-hidden size-10 text-neutral-400 grid place-content-center  bg-neutral-100 border border-neutral-400/35 rounded-full">
            <img class=" w-auto h-full aspect-square object-cover" src="https://www.redaezziani.com/profile-image.webp" alt="profile-image" />
            </span>
            <div class="flex justify-center items-center">
                <div class="flex flex-col gap-1 items-center justify-center">
                    <p class=" text-neutral-400">
                        {{ auth()->user()->name }}
                    </p>
                </div>
            </div>
            <svg class="w-5 h-5 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div x-show="isOpen"
            @click.away="isOpen = false"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="absolute right-0 z-20 w-48 py-2 mt-2 origin-top-right bg-white rounded-md  border border-neutral-400/35 dark:bg-gray-800"
        >
            <h1>
                <a href="{{ route('dashboard-index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Dashboard</a>
            </h1>
        </div>
    </div>

    @endguest

</div>
