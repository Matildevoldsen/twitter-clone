<div class="w-full sm:w-600 h-screen">
    @if ($tweet)
        <div
            class="flex space-x-2 items-center border-b px-4 py-3 sticky top-0 bg-white dark:bg-dim-900 border-l border-r border-gray-200 dark:border-gray-700">
            <a href="{{ route('home') }}" class="dark:hover:bg-gray-800 hover:bg-gray-200 p-3 rounded-lg transition"
               wire:navigate>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-5 text-blue-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                </svg>
            </a>

            <h2 class="text-gray-800 dark:text-gray-100 font-bold font-sm">
                {{ $tweet->user->name }}'s Tweet
            </h2>
        </div>

        @foreach($this->getParents() as $parentTweet)
            <livewire:components.tweets.tweet :reply="true" :wire:key="$parentTweet->id" :first="$loop->first"
                                              :tweet="$parentTweet"/>
        @endforeach

        <div>
            reply
        </div>

        <div
            class="border-b flex justify-center justify-items-center items-center border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out pb-4 border-l border-r"
        >
            <p class="mt-3 dark:text-gray-300 text-gray-700">No replies.</p>
        </div>
    @endif
</div>
