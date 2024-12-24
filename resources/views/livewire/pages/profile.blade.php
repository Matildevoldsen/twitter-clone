<div class="h-screen">
    <div class="flex justify-center">
        <main role="main" class="h-screen max-w-[600px] w-[600px] min-w-[600px]">
            <div class="w-3/5 border border-y-0 dark:border-gray-800 max-w-[600px] w-[600px] min-w-[600px] border-gray-200">
                <div class="border-t border-gray-200 dark:border-gray-700">
                    <livewire:components.profile.edit-profile :user="$user"/>

                    <div class="border-t dark:border-gray-700 border-gray-200">
                        @foreach($user->tweets as $tweet)
                            <livewire:components.tweets.tweet :tweet="$tweet" :key="$tweet->id"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>

    @if ($user->id === auth()->user()->id)
        <livewire:modals.edit-profile-modal/>
    @endif
</div>
