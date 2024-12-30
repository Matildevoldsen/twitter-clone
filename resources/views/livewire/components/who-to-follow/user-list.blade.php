<div
    class="cursor-pointer border-b border-gray-200 p-3 text-sm font-normal text-blue-400"
>        @foreach($users as $user)
        <div
            class="flex duration-350 flex-row justify-between p-2 transition ease-in-out hover:bg-gray-100 dark:border-dim-200 dark:hover:bg-dim-300"
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
