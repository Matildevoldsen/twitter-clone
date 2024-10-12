<div>
    @if ($tweet->original_tweet_id)
        <div
            class="border-b border-t border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-300 ease-in-out pb-4 border-l border-r">

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

            <livewire:components.tweets.tweet-user :tweet="$tweet"/>
            <a href="" wire:navigate.hover class="!text-white !no-underline">
                <p class="tweet-body">
                    {!! $tweet->originalTweet->content_with_links !!}
                </p>
            </a>
            <div class="pl-16">
                <livewire:components.tweets.tweet-actions :tweet="$tweet"/>
            </div>
        </div>
    @else
        <div
            class="border-b border-t border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-300 ease-in-out pb-4 border-l border-r">
            <livewire:components.tweets.tweet-user :tweet="$tweet"/>
            <a href="" wire:navigate.hover class="!text-white !no-underline">
                <p class="tweet-body">
                    {!! $tweet->content_with_links !!}
                </p>
            </a>
            <div class="pl-16">
                <livewire:components.tweets.tweet-actions :tweet="$tweet"/>
            </div>
        </div>
    @endif

</div>
