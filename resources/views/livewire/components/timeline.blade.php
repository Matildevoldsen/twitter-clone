<div>
    @forelse($tweets as $tweet)
        <livewire:components.tweets.tweet :wire:key="$tweet->id" :tweet="$tweet" />
    @empty
        <div class="p-4 text-center text-gray-800 dark:text-gray-200">
            No tweets found.
        </div>
    @endforelse
</div>
