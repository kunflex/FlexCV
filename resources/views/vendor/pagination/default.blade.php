@if ($paginator->hasPages())
    <nav class="nav">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
<style>
    /* Container for pagination */
.nav {
    text-align: center; /* Centers the pagination bar */
}

/* General styling for the pagination list */
.pagination {
    display: inline-flex;
    list-style: none; /* Removes default list styling */
    padding: 0;
}

/* Styling for each pagination item */
.pagination li {
    margin: 0 5px; /* Space between pagination items */
}

/* Styles for pagination links */
.pagination li a {
    color: #0095FF; /* Sets the link color */
    text-decoration: none; /* Removes underline */
    padding: 8px 12px; /* Padding inside each link for better clickability */
    border: 1px solid #0095FF; /* Border matching the link color */
    border-radius: 5px; /* Rounded corners for the links */
}

/* Hover effects for links */
.pagination li a:hover {
    background-color: #0095FF; /* Background color on hover */
    color: #ffffff; /* Text color on hover */
}

/* Styles for the currently active page */
.pagination li.active span {
    background-color: #0095FF; /* Background color for the active page */
    color: #ffffff; /* Text color for the active page */
    padding: 8px 12px; /* Padding for the active item */
    border-radius: 5px; /* Rounded corners for the active item */
}

/* Styles for disabled pagination links (previous on first page, next on last page) */
.pagination li.disabled span {
    color: #cccccc; /* Lighter text color for disabled links */
    cursor: not-allowed; /* Shows a 'no permission' cursor on hover */
}

</style>