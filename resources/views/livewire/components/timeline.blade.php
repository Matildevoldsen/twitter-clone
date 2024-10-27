<div>
    @foreach ($tweets as $tweet)
        <livewire:components.tweets.tweet :wire:key="$tweet->id" :tweet="$tweet"/>
    @endforeach

    @if ($this->hasMorePages())
        <div x-intersect.throttle.200ms="$wire.loadMore" class="-translate-y-32"></div>
    @endif

    @if ($this->hasMorePages())
        <button wire:click="loadMore">
            Load More
        </button>
    @endif
</div>
