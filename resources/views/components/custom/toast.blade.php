<span
x-data="{show:false}"
x-show= "show"
x-on:open-toast.window="show=true"
x-on:close-toast.window="show=false"
style="display: none"
x-transition
class=" toast-animation group z-50 w-80 h-16 py-2 rounded-md bg-white px-2 flex flex-col justify-start items-start gap-2 absolute top-1 right-2 border border-neutral-400/35"
>
<x-button
x-on:click="show=false"
class=" outline hidden group-hover:flex size-6 py-2 px-2 absolute right-2 font-bold top-2">
    x
</x-button>
<div class="flex justify-start gap-2 items-center w-[90%] ">

        <svg
            className="text-green-400 w-6"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            width="20"
            height="20"
            fill="none"
        >
            <path
                d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z"
                stroke="currentColor"
                stroke-width="1"
            />
            <path
                d="M8 12.5L10.5 15L16 9"
                stroke="currentColor"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
        </svg>
    <div class="flex truncate line-clamp-1 w-full flex-col justify-start items-start">
        <h1 class=" text-green-400 font-medium">
            Toast Notification !
        </h1>
        <p
        class=" text-sm text-neutral-500 line-clamp-1 truncate lowercase"
        >
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
        </p>
    </div>

</div>
</span>
