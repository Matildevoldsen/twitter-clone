<div class="flex items-start space-x-4 border-b p-4 border-t border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out pb-4 border-l border-r">
    <div class="mt-2 flex-shrink-0 text-blue-400">
        {!! $this->getIcon() !!}
    </div>
    <div class="flex-1">
        <a href="{{ route('profile.show', $this->getUser()) }}" wire:navigate class="flex items-center space-x-3">
            <img src="{{ $this->getUser()->profile_photo_url }}" alt="User Image" class="w-10 h-10 rounded-full">
        </a>

        @if ($this->notification->type !== \App\Notifications\FollowNotification::class)
            <div class="mt-2 text-gray-300 text-sm">
                <p>
                    <a href="{{ route('profile.show', $this->getUser()) }}" wire:navigate class=" hover:underline font-bold">
                        {{ $this->getUser()->name }}
                    </a> {{ $this->notification->data['action'] }} your tweet.
                </p>
            </div>
            <a href="/" wire:navigate class="mt-2 text-gray-300 text-sm">
                {!! $this->getTweet()->content_with_links !!}

                @if ($this->getTweet()->getMedia()->count() > 0)
                    <div class="flex flex-wrap -mx-2 my-3 pr-3">
                        @foreach($this->getTweet()->getMedia() as $media)
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
        @else
            <div class="mt-2 text-gray-300 text-sm">
                <p><a href="{{ route('profile.show', $this->getUser()) }}" wire:navigate class=" hover:underline font-bold">{{ $this->getUser()->name }}</a> followed you.</p>
            </div>
        @endif
    </div>
</div>
