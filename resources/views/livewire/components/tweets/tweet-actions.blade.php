<div class="flex mt-5">
    <div class="w-full">
        <div class="flex items-center">
            <a
                href="{{ route('tweet.show', $tweet) }}"
                class="flex-1 flex items-center text-gray-800 dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400 transition duration-350 ease-in-out"
            >
                <svg
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="w-5 h-5 mr-2"
                >
                    <g>
                        <path
                            d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"
                        ></path>
                    </g>
                </svg>
                0
            </a>
            <livewire:components.tweets.retweet-action :tweet="$tweet"/>
            @if (auth()->user() && auth()->user()->hasLiked($tweet))
                <div
                    wire:click="dislike"
                    class="flex-1 flex items-center text-gray-800 dark:text-white text-xs hover:text-red-600 dark:hover:text-red-600 transition duration-350 ease-in-out"
                >
                    <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" width="800px" height="800px"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14 20.408c-.492.308-.903.546-1.192.709-.153.086-.308.17-.463.252h-.002a.75.75 0 01-.686 0 16.709 16.709 0 01-.465-.252 31.147 31.147 0 01-4.803-3.34C3.8 15.572 1 12.331 1 8.513 1 5.052 3.829 2.5 6.736 2.5 9.03 2.5 10.881 3.726 12 5.605 13.12 3.726 14.97 2.5 17.264 2.5 20.17 2.5 23 5.052 23 8.514c0 3.818-2.801 7.06-5.389 9.262A31.146 31.146 0 0114 20.408z"/>
                    </svg>
                    {{ $this->getLikes() }}
                </div>
            @else
                @auth
                    <div
                        wire:click="like"
                        class="flex-1 flex items-center text-gray-800 dark:text-white text-xs hover:text-red-600 dark:hover:text-red-600 transition duration-350 ease-in-out">
                        <svg
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="w-5 h-5 mr-2"
                        >
                            <g>
                                <path
                                    d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"
                                ></path>
                            </g>
                        </svg>
                        {{ $this->getLikes() }}
                    </div>
                @endauth

                @guest
                    <div
                        class="flex-1 flex items-center text-gray-800 dark:text-white text-xs hover:text-red-600 dark:hover:text-red-600 transition duration-350 ease-in-out">
                        <svg
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="w-5 h-5 mr-2"
                        >
                            <g>
                                <path
                                    d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"
                                ></path>
                            </g>
                        </svg>
                        {{ $this->getLikes() }}
                    </div>
                @endguest
            @endif

            <livewire:components.tweets.share-action :tweet="$tweet"/>
        </div>
    </div>
</div>
