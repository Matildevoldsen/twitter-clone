<div class="hidden h-screen w-290 md:block lg:w-350">
    <div
        class="fixed flex h-screen w-290 flex-col overflow-y-auto lg:w-350"
    >
        <livewire:components.searchbar />
        @if (!request()->routeIs('follower.list'))
            <livewire:components.who-to-follow.who-to-follow lazy />
        @endif
        <footer>
            <ul class="mx-2 my-4 text-xs text-gray-500">
                <li class="mx-2 inline-block">
                    <a href="#">
                        Terms of Service</a>
                </li>
                <li class="mx-2 inline-block">
                    <a href="#">
                        Privacy Policy</a>
                </li>
                <li class="mx-2 inline-block">
                    <a href="#">
                        Cookie Policy</a>
                </li>
                <li class="mx-2 inline-block">
                    <a href="#">
                        Ads info</a>
                </li>
                <li class="mx-2 inline-block">
                    <a href="#">
                        More</a>
                </li>
                <li class="mx-2 inline-block">
                    © {{ date('Y') }} {{ config('app.name') }}, Inc.
                </li>
            </ul>
        </footer>
    </div>
</div>
