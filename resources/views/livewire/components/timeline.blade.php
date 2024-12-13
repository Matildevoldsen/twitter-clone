<div>
    @foreach ($tweets as $tweet)
        <div>
            <livewire:components.tweets.tweet :key="$tweet->uuid" :tweet="$tweet"/>
        </div>
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
