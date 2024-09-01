<div class="border-b border-t border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-300 ease-in-out pb-4 border-l border-r">
    <livewire:components.tweets.tweet-user :tweet="$tweet" />
    <a href="" wire:navigate.hover class="!text-white !no-underline">
        <p class="text-base pl-16 font-medium text-gray-800 dark:text-white flex-shrink">
            {{ $tweet->body }}
        </p>
    </a>
    <div class="pl-16">
        <livewire:components.tweets.tweet-actions :tweet="$tweet" />
    </div>
</div>
