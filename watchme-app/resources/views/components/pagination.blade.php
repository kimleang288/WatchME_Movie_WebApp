@push('styles')
@vite(['resources/css/search-results.css'])
@endpush
@props(['currentPage', 'totalPages', 'route', 'routeParams' => []])
@if($totalPages > 1)
<div class="pagination">
    @if($currentPage > 1)
    <a href="{{ route($route, array_merge($routeParams, ['page' => $currentPage - 1])) }}" class="page-btn">&laquo;</a>
    @else
    <span class="page-btn disabled">&laquo;</span>
    @endif

    @php
    $window = 2;
    $rangeStart = max(1, $currentPage - $window);
    $rangeEnd = min($totalPages, $currentPage + $window);
    @endphp

    @if($rangeStart > 1)
    <a href="{{ route($route, array_merge($routeParams, ['page' => 1])) }}" class="page-btn">1</a>
    @if($rangeStart > 2)
    <span class="page-btn disabled">...</span>
    @endif
    @endif

    @for($i = $rangeStart; $i <= $rangeEnd; $i++)
        <a href="{{ route($route, array_merge($routeParams, ['page' => $i])) }}"
        class="page-btn {{ $i === $currentPage ? 'active' : '' }}">{{ $i }}</a>
        @endfor

        @if($rangeEnd < $totalPages)
            @if($rangeEnd < $totalPages - 1)
            <span class="page-btn disabled">...</span>
            @endif
            <a href="{{ route($route, array_merge($routeParams, ['page' => $totalPages])) }}" class="page-btn">{{ $totalPages }}</a>
            @endif

            @if($currentPage < $totalPages)
                <a href="{{ route($route, array_merge($routeParams, ['page' => $currentPage + 1])) }}" class="page-btn">&raquo;</a>
                @else
                <span class="page-btn disabled">&raquo;</span>
                @endif
</div>
@endif