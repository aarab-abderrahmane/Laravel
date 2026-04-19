@if ($paginator->hasPages())
    <div class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="#" class="pagination-arrow" style="opacity: 0.5; pointer-events: none;">
                <i class="iconoir-nav-arrow-left"></i>
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-arrow">
                <i class="iconoir-nav-arrow-left"></i>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span style="color: var(--text-secondary);">...</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="#" class="active">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-arrow">
                <i class="iconoir-nav-arrow-right"></i>
            </a>
        @else
            <a href="#" class="pagination-arrow" style="opacity: 0.5; pointer-events: none;">
                <i class="iconoir-nav-arrow-right"></i>
            </a>
        @endif
    </div>
@endif