<div x-data x-on:click="$dispatch('side-bar-open')"
   wire:poll.alive
    class=" flex justify-center cursor-pointer items-center relative" href="">
    {{-- render the span just if he auth --}}
    @if (Auth::check())
        <span
            class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full size-4 flex justify-center items-center  text-xs font-bold">
            {{ $count }}
        </span>
    @endif
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path
            d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
        <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
    </svg>
</div>
