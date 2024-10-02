<div
    x-data="{ open: false }"
    x-on:comments-bar-open.window="open = true"
    x-on:comments-bar-close.window="open = false"
    x-on:click.outside="open = false"
    x-show="open"
    x-cloak
    class="w-full z-[999] overflow-hidden h-screen backdrop-blur-sm bg-black/10 fixed left-0 top-0">

    <div x-on:click="open = false" class="w-full z-[1] overflow-hidden h-screen backdrop-blur-sm bg-black/20"></div>

    <aside x-show="open" class="w-[20rem] md:w-[35rem] z-10 absolute left-0 top-0 h-screen flex bg-white flex-col gap-4 p-4">
        <div class="w-full flex justify-between items-center">
            <p class="text-2xl font-semibold text-slate-800">تعليقات المنتج</p>
            <svg x-on:click="open = false" class="text-slate-800" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-x">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M18 6l-12 12"/>
                <path d="M6 6l12 12"/>
            </svg>
        </div>

        <div class="flex flex-col mt-4 w-full justify-start items-start gap-4">
            @if ($comments && count($comments) > 0)
                @foreach ($comments as $comment)
                    <div class="w-full">
                        <p class="text-lg font-semibold">{{ $comment->user->name }}</p>
                        <p class="text-base text-slate-600">{{ $comment->comment_text }}</p>
                        <p class="text-sm text-slate-400">{{ $comment->created_at->format('d/m/Y') }}</p>
                        <hr class="my-2">
                    </div>
                @endforeach
            @else
            <div class="flex-col flex justify-start items-start gap-3">
                <div class="w-full flex gap-2 justify-start items-start flex-col">
                    <div class=" w-80 h-2 bg-slate-300 animate-pulse"></div>
                    <div class="w-96 h-2 bg-slate-300 animate-pulse"></div>
                    <div class=" w-60 h-2 bg-slate-300 animate-pulse">
                    </div>
                    <hr class="my-2">
                </div>

                <div class="w-full flex gap-2 justify-start items-start flex-col">
                    <div class=" w-80 h-2 bg-slate-300 animate-pulse"></div>
                    <div class="w-96 h-2 bg-slate-300 animate-pulse"></div>
                    <div class=" w-60 h-2 bg-slate-300 animate-pulse">
                    </div>
                    <hr class="my-2">
                </div>

                <div class="w-full flex gap-2 justify-start items-start flex-col">
                    <div class=" w-80 h-2 bg-slate-300 animate-pulse"></div>
                    <div class="w-96 h-2 bg-slate-300 animate-pulse"></div>
                    <div class=" w-60 h-2 bg-slate-300 animate-pulse">
                    </div>
                    <hr class="my-2">
                </div>
            </div>

            @endif
        </div>
    </aside>
</div>
