<x-layout title="الصفحة غير موجودة 404!" description="" keywords="">
    <span class="absolute top-4 right-4 cursor-pointer" onclick="history.back()">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M15 16l4 -4" /><path d="M15 8l4 4" /></svg>
    </span>
    <main class="w-full h-screen overflow-hidden flex justify-center items-center flex-col gap-3">
        <img src="{{ asset('storage/empty.png') }}" alt="empty" class="w-44 select-none h-44 object-cover">

        <h1 class="text-neutral-600 text-lg font-bold">
            الصفحة غير موجودة
        </h1>
        <h3 class="text-neutral-400 max-w-72 text-sm text-center">
            عذراً، ولكن الصفحة التي تبحث عنها غير موجودة.
        </h3>

        <button class="bg-blue-700 default mt-3 flex justify-center items-center gap-x-2 text-white px-8 h-[42px] rounded-lg font-semibold transition-all ease-in-out duration-300 capitalize focus:ring-2 focus:ring-offset-2 focus:ring-blue-700" onclick="history.back()">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-arrow-narrow-left">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 12h14"></path>
                <path d="M5 12l4 -4"></path>
                <path d="M5 12l4 4"></path>
            </svg>
            العودة إلى الصفحة السابقة
        </button>
    </main>
</x-layout>
