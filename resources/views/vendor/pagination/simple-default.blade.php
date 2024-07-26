@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center w-full justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-neutral-500 bg-white border border-neutral-300 cursor-default leading-5 rounded-md dark:text-neutral-600 dark:bg-neutral-800 dark:border-neutral-600">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 leading-5 rounded-md hover:text-neutral-500 focus:outline-none focus:ring ring-neutral-300 focus:border-blue-300 active:bg-neutral-100 active:text-neutral-700 transition ease-in-out duration-150 dark:bg-neutral-800 dark:border-neutral-600 dark:text-neutral-300 dark:focus:border-blue-700 dark:active:bg-neutral-700 dark:active:text-neutral-300">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 leading-5 rounded-md hover:text-neutral-500 focus:outline-none focus:ring ring-neutral-300 focus:border-blue-300 active:bg-neutral-100 active:text-neutral-700 transition ease-in-out duration-150 dark:bg-neutral-800 dark:border-neutral-600 dark:text-neutral-300 dark:focus:border-blue-700 dark:active:bg-neutral-700 dark:active:text-neutral-300">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-neutral-500 bg-white border border-neutral-300 cursor-default leading-5 rounded-md dark:text-neutral-600 dark:bg-neutral-800 dark:border-neutral-600">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-neutral-700 leading-5 dark:text-neutral-400">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex rtl:flex-row-reverse shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span
                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-neutral-500 bg-white border border-neutral-300 cursor-default rounded-l-md leading-5 dark:bg-neutral-800 dark:border-neutral-600"
                                aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="20" fill="none">
                                    <path d="M4 12L20 12" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8.99996 17C8.99996 17 4.00001 13.3176 4 12C3.99999 10.6824 9 7 9 7"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-neutral-500 bg-white border border-neutral-300 rounded-l-md leading-5 hover:text-neutral-400 focus:z-10 focus:outline-none focus:ring ring-neutral-300 focus:border-blue-300 active:bg-neutral-100 active:text-neutral-500 transition ease-in-out duration-150 dark:bg-neutral-800 dark:border-neutral-600 dark:active:bg-neutral-700 dark:focus:border-blue-800"
                            aria-label="{{ __('pagination.previous') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                                fill="none">
                                <path d="M4 12L20 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M8.99996 17C8.99996 17 4.00001 13.3176 4 12C3.99999 10.6824 9 7 9 7"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-neutral-700 bg-white border border-neutral-300 cursor-default leading-5 dark:bg-neutral-800 dark:border-neutral-600">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span
                                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-neutral-500 bg-white border border-neutral-300 cursor-default leading-5 dark:bg-neutral-800 dark:border-neutral-600">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-neutral-700 bg-white border border-neutral-300 leading-5 hover:text-neutral-500 focus:z-10 focus:outline-none focus:ring ring-neutral-300 focus:border-blue-300 active:bg-neutral-100 active:text-neutral-700 transition ease-in-out duration-150 dark:bg-neutral-800 dark:border-neutral-600 dark:text-neutral-400 dark:hover:text-neutral-300 dark:active:bg-neutral-700 dark:focus:border-blue-800"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-neutral-500 bg-white border border-neutral-300 rounded-r-md leading-5 hover:text-neutral-400 focus:z-10 focus:outline-none focus:ring ring-neutral-300 focus:border-blue-300 active:bg-neutral-100 active:text-neutral-500 transition ease-in-out duration-150 dark:bg-neutral-800 dark:border-neutral-600 dark:active:bg-neutral-700 dark:focus:border-blue-800"
                            aria-label="{{ __('pagination.next') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                                fill="none">
                                <path d="M20 12L4 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M15 17C15 17 20 13.3176 20 12C20 10.6824 15 7 15 7" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span
                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-neutral-500 bg-white border border-neutral-300 cursor-default rounded-r-md leading-5 dark:bg-neutral-800 dark:border-neutral-600"
                                aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="20" fill="none">
                                    <path d="M20 12L4 12" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15 17C15 17 20 13.3176 20 12C20 10.6824 15 7 15 7" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
