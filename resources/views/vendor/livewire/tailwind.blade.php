<div class="py-1 px-4" aria-label="Pagination Navigation">
    @if ($paginator->hasPages())
        <nav class="pagination">
            @if ($paginator->onFirstPage())
                <span class="w-6 h-6 text-gray-400 p-2 flex items-center gap-2 font-medium rounded-md">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                </span>
            @else
                <a class="w-6 h-6 text-gray-400 hover:text-primary p-2 flex items-center gap-2 font-medium rounded-md"
                   href="javascript:void(0)" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                   wire:loading.attr="disabled"
                   dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="w-6 h-6 text-gray-400 p-2 flex items-center font-medium rounded-md">
                        <span aria-hidden="true">{{ $element }}</span>
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="w-6 h-6 bg-primary text-white p-2 flex justify-center items-center text-xs font-medium rounded-full"
                               href="javascript:void(0)" aria-current="page"
                               wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}">
                                {{ $page }}
                            </a>
                        @else
                            <a class="w-6 h-6 text-gray-400 hover:text-primary p-2 flex justify-center items-center text-xs font-medium rounded-full"
                               href="javascript:void(0)"
                               wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                               wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="w-6 h-6 text-gray-400 hover:text-primary p-2 flex items-center gap-2 font-medium rounded-md"
                   href="javascript:void(0)" wire:loading.attr="disabled"
                   wire:click="nextPage('{{ $paginator->getPageName() }}')"
                   dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                   rel="next">
                    <span aria-hidden="true">»</span>
                    <span class="sr-only">Next</span>
                </a>
            @else
                <span class="w-6 h-6 text-gray-400 p-2 flex items-center gap-2 font-medium rounded-md">
                    <span aria-hidden="true">»</span>
                    <span class="sr-only">Next</span>
                </span>
            @endif
        </nav>
    @endif
</div>
