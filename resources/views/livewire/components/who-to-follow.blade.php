<div class="m-2 rounded-2xl bg-gray-50 dark:bg-dim-700">
    <h2
        class="text-md border-b border-gray-200 p-3 font-bold text-gray-900 dark:border-dim-200 dark:text-white"
    >
        Who to follow
    </h2>

    <div
        class="duration-350 cursor-pointer border-b border-gray-200 p-3 text-sm font-normal text-blue-400 transition ease-in-out hover:bg-gray-100 dark:border-dim-200 dark:hover:bg-dim-300"
    >        @foreach($users as $user)
            <div
                class="flex flex-row justify-between p-2"
            >
                <a wire:navigate href="{{ route('profile.show', $user) }}" class="flex flex-row">
                    <img
                        class="h-10 w-10 rounded-full"
                        src="{{ $user->profile_photo_url }}"
                        alt="Profile photo of {{ $user->name }}"
                    />
                    <div class="ml-2 flex flex-col">
                        <h1
                            class="text-sm font-bold text-gray-900 dark:text-white"
                        >
                            {{ $user->name }}
                        </h1>
                        <p class="text-sm text-gray-400">
                            {{ '@' . $user->username }}
                        </p>
                    </div>
                </a>
                <div>
                    @if (auth()->user()->isFollowing($user))
                        <button
                            type="button"
                            wire:click="toggleFollow({{ $user->id }})"
                            class="rounded-full border-2 bg-blue-400 px-4 py-1 text-xs font-bold text-white"
                        >
                            Unfollow
                        </button>
                    @else
                        <button
                            type="button"
                            wire:click="toggleFollow({{ $user->id }})"
                            class="rounded-full border-2 border-blue-400 px-4 py-1 text-xs font-bold text-blue-400"
                        >
                            Follow
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <div
        class="duration-350 cursor-pointer p-3 text-sm font-normal text-blue-400 transition ease-in-out hover:bg-gray-100 dark:hover:bg-dim-300"
    >
        Show more
    </div>
</div>
