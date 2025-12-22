@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">‹</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">‹</a>
                </li>
            @endif

            {{-- First 2 pages --}}
            @for ($i = 1; $i <= min(2, $paginator->lastPage()); $i++)
                <li class="page-item {{ $paginator->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            {{-- Ellipsis --}}
            @if ($paginator->lastPage() > 4)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif

            {{-- Last 2 pages --}}
            @for ($i = max($paginator->lastPage() - 1, 3); $i <= $paginator->lastPage(); $i++)
                @if ($i > 2)
                    <li class="page-item {{ $paginator->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">›</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">›</span>
                </li>
            @endif

        </ul>
    </nav>
@endif
