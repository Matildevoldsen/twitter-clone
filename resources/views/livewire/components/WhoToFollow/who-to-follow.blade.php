<div class="m-2 rounded-2xl bg-gray-50 dark:bg-dim-700">
    <h2
        class="text-md border-b border-gray-200 p-3 font-bold text-gray-900 dark:border-dim-200 dark:text-white"
    >
        Who to follow
    </h2>

    <livewire:components.who-to-follow.user-list />
    <a
        href="{{ route('follower.list') }}"
        wire:navigate
        class="duration-350 block cursor-pointer p-3 text-sm font-normal text-blue-400 transition ease-in-out hover:bg-gray-100 dark:hover:bg-dim-300"
    >
        Show more
    </a>
</div>
