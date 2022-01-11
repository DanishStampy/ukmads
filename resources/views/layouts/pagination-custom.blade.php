@if ($paginator->hasPages())
    <div class="pagination_rounded">
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled page__btn" aria-disabled="true" aria-label="@lang('pagination.previous')">
                  <a href="#" class="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> Prev </a>
                    {{-- <span aria-hidden="true">&lsaquo;</span> --}}
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="prev" rel="prev" aria-label="@lang('pagination.previous')">
                      <i class="fa fa-angle-left" aria-hidden="true"></i> Prev
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled hidden-xs" aria-disabled="true"><a>{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active hidden-xs" aria-current="page"><a>{{ $page }}</a></li>
                        @else
                            <li><a class="hidden-xs" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="next" rel="next" aria-label="@lang('pagination.next')">
                      Next <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                </li>
            @else
                <li class="disabled page__btn" aria-disabled="true" aria-label="@lang('pagination.next')">
                  <a href="#" class="next"> Next <i class="fa fa-angle-right" aria-hidden="true"></i></a>  
                </li>
            @endif
        </ul>
    </div>
@endif
