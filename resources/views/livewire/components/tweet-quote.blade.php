<div
    class="border-b border-t rounded-lg border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out pb-4 border-l border-r"
>
    <livewire:components.tweets.tweet-user :tweet="$tweet"/>
    <a href="{{ route('tweet.show', $tweet) }}" wire:navigate.hover class="block pl-16">
        <p
            class="text-base width-auto font-medium text-gray-800 dark:text-white flex-shrink"
        >
            {!! $tweet->body !!}
        </p>

        @if ($tweet->getMedia()->count() > 0)
            <div class="flex flex-wrap -mx-2 my-3 pr-3">
                @foreach($tweet->getMedia() as $media)
                    <div class="w-1/2 px-2 mb-4">
                        <div class="rounded-2xl overflow-hidden border border-gray-600">
                            <img src="{{ $media->getUrl() }}" alt="Tweet Image"
                                 class="w-full h-auto object-cover rounded-2xl">
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </a>
</div>
