<div
x-data="{show:false}"
x-show= "show"
x-on:open-sheet.window="show=true"
x-on:close-sheet.window="show=false"
style="display: none"
x-transition
class="w-full h-full z-50 top-0 right-0 overflow-hidden  fixed ">
    <aside
    class=" absolute z-10 top-0 left-[0%] h-screen w-full max-w-full px-3 py-6 bg-white border-r flex justify-start items-start border-neutral-400/35">
        <div class="w-full flex justify-start items-center">
            <x-button x-on:click="show=false" class=" outline py-1 px-3">x</x-button>
        </div>
    </aside>
</div>
