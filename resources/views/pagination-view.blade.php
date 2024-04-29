<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="d-flex justify-content-between">
            <div>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="btn btn-secondary disabled">{!! __('pagination.previous') !!}</span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                        class="btn btn-primary mr-2">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </div>

            <div>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                        class="btn btn-primary ml-2">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <span class="btn btn-secondary disabled">{!! __('pagination.next') !!}</span>
                @endif
            </div>
        </nav>
    @endif


</div>
