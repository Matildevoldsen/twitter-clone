<div>
    @if (count($chunks) > 0)
        @for ($chunk = 0; $chunk < $page; $chunk++)
            <livewire:components.timeline-chunk :ids="$chunks[$chunk]" :key="$chunk"/>
        @endfor
    @endif

    @if ($this->hasMorePages())
        <div x-intersect="$wire.loadMore" class="-translate-y-32"></div>
    @endif

    @if ($this->hasMorePages())
        <button wire:click="loadMore">
            Load More
        </button>
    @endif
</div>
