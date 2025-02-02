<div>
    @if ($tweet->original_tweet_id && !$reply)
        <div
            class="border-b-0 border-t-0 border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out pb-4 border-l border-r"
        >
            @if (!$tweet->body)
                <div class="flex flex-shrink-0 pt-4 pb-0 text-gray-400">
                    <div class="w-16 flex justify-end pr-2 pb-1">
                        <svg fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                            <g>
                                <path
                                    d="M23.615 15.477c-.47-.47-1.23-.47-1.697 0l-1.326 1.326V7.4c0-2.178-1.772-3.95-3.95-3.95h-5.2c-.663 0-1.2.538-1.2 1.2s.537 1.2 1.2 1.2h5.2c.854 0 1.55.695 1.55 1.55v9.403l-1.326-1.326c-.47-.47-1.23-.47-1.697 0s-.47 1.23 0 1.697l3.374 3.375c.234.233.542.35.85.35s.613-.116.848-.35l3.375-3.376c.467-.47.467-1.23-.002-1.697zM12.562 18.5h-5.2c-.854 0-1.55-.695-1.55-1.55V7.547l1.326 1.326c.234.235.542.352.848.352s.614-.117.85-.352c.468-.47.468-1.23 0-1.697L5.46 3.8c-.47-.468-1.23-.468-1.697 0L.388 7.177c-.47.47-.47 1.23 0 1.697s1.23.47 1.697 0L3.41 7.547v9.403c0 2.178 1.773 3.95 3.95 3.95h5.2c.664 0 1.2-.538 1.2-1.2s-.535-1.2-1.198-1.2z"
                                ></path>
                            </g>
                        </svg>
                    </div>
                    <div class="text-xs font-bold">{{ $tweet->user->name }} retweeted</div>
                </div>
            @endif

            <livewire:components.tweets.tweet-user :tweet="$tweet->originalTweet"/>
            <a href="{{ $this->getTweetUrl() }}" wire:navigate.hover class="!text-black !dark:text-white !no-underline">
                <p
                    class="tweet-body !text-black"
                >
                    @if ($tweet->originalTweet && $tweet->content)
                        {!! $tweet->content_with_links !!}
                    @else
                        {!! $tweet->originalTweet->content_with_links !!}
                    @endif
                </p>

                @if ($tweet->originalTweet->getMedia()->count() > 0)
                    <div class="flex pl-16 flex-wrap -mx-2 my-3 pr-3">
                        @foreach($tweet->originalTweet->getMedia() as $media)
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

            @if ($tweet->body)
                <div class="pl-16 pr-2 mt-2">
                    <livewire:components.tweet-quote :tweet="$tweet->originalTweet"/>
                </div>
            @endif

            <div class="pl-16">
                <livewire:components.tweets.tweet-actions :tweet="$tweet->originalTweet"/>
            </div>
        </div>
    @elseif(!$reply)
        <div
            class="border-b border-t border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out pb-4 border-l border-r"
        >
            <livewire:components.tweets.tweet-user :tweet="$tweet"/>
            <a href="{{ route('tweet.show', $tweet) }}" wire:navigate.hover class="!text-black !dark:text-white !no-underline">
                <p class="tweet-body !text-black">
                    {!! $tweet->content_with_links !!}
                </p>

                @if ($tweet->getMedia()->count() > 0)
                    <div class="flex pl-16 flex-wrap -mx-2 my-3 pr-3">
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
            <div class="pl-16">
                <livewire:components.tweets.tweet-actions :tweet="$tweet"/>
            </div>
        </div>
    @else
        <div
            class="border-b-0 border-t-0 border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out mb-0 pb-0 border-l border-r">
            <div class="flex w-full h-full">
                <div class="flex flex-col h-full" style="height: revert;">
                    <div class="w-[2px] bg-gray-600 absolute h-[10px] flex self-center"></div>

                    <livewire:components.tweets.tweet-user :reply="true" :tweet="$tweet"/>

                    <div class="w-[2px] bg-gray-600 min-h-[60px] h-full flex self-center"></div>
                </div>
                <div class="flex w-full h-full flex-col">
                    <div class="mt-3">
                        <p
                            class="flex items-center text-base leading-6 font-medium text-gray-800 dark:text-white"
                        >
                            {{ $tweet?->user?->name}}
                            @if ($tweet?->user->is_verified)
                                <svg
                                    viewBox="0 0 24 24"
                                    aria-label="Verified account"
                                    fill="currentColor"
                                    class="w-4 h-4 ml-1 text-blue-500 dark:text-white"
                                >
                                    <g>
                                        <path
                                            d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z"
                                        ></path>
                                    </g>
                                </svg>
                            @endif
                            <span
                                class="ml-1 text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150"
                            >
                        {{ '@' . $tweet->user->username }} ・ {{ $tweet->created_at->diffForHumans() }}
                      </span>
                        </p>
                    </div>

                    <a href="{{ route('tweet.show', $tweet) }}" class="!text-black !dark:text-white !no-underline" wire:navigate.hover>
                        <p class="tweet-body !text-black !pl-0">
                            {!! $tweet->content_with_links !!}
                        </p>
                        @if ($tweet->getMedia()->count() > 0)
                            <div class="flex flex-wrap pl-16 -mx-2 my-3 pr-3">
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

                    <div class="mb-3">
                        <livewire:components.tweets.tweet-actions :tweet="$tweet"/>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
