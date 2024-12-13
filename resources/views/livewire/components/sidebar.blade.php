<div class="flex flex-row justify-center">
    <div class="w-68 xs:w-88 xl:w-275 h-screen">
        <div class="flex flex-col h-screen xl:pr-3 fixed overflow-y-auto w-68 xs:w-88 xl:w-275">
            <a class="flex my-2 justify-center xl:justify-start" href="#">
                <svg
                    viewBox="0 0 24 24"
                    class="w-8 h-8 text-blue-400 dark:text-white"
                    fill="currentColor"
                >
                    <g>
                        <path
                            d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z"
                        ></path>
                    </g>
                </svg>
            </a>
            <nav class="mt-5">
                <x-sidebar-item url="{{ route('home') }}" active="{{ request()->routeIs('home') }}">
                    <svg fill="currentColor" viewBox="0 0 24 24" class="h-6 w-6">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M22.58 7.35L12.475 1.897c-.297-.16-.654-.16-.95 0L1.425 7.35c-.486.264-.667.87-.405 1.356.18.335.525.525.88.525.16 0 .324-.038.475-.12l.734-.396 1.59 11.25c.216 1.214 1.31 2.062 2.66 2.062h9.282c1.35 0 2.444-.848 2.662-2.088l1.588-11.225.737.398c.485.263 1.092.082 1.354-.404.263-.486.08-1.093-.404-1.355zM12 15.435c-1.795 0-3.25-1.455-3.25-3.25s1.455-3.25 3.25-3.25 3.25 1.455 3.25 3.25-1.455 3.25-3.25 3.25z"
                        ></path>
                    </svg>
                    <span class="hidden xl:block ml-4 font-bold text-md">Home</span>
                </x-sidebar-item>
                @auth
                    <x-sidebar-item url="{{ route('notifications') }}"
                                    active="{{ request()->routeIs('notifications') }}">
                        <svg fill="currentColor" viewBox="0 0 24 24" class="h-6 w-6">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21.697 16.468c-.02-.016-2.14-1.64-2.103-6.03.02-2.532-.812-4.782-2.347-6.335C15.872 2.71 14.01 1.94 12.005 1.93h-.013c-2.004.01-3.866.78-5.242 2.174-1.534 1.553-2.368 3.802-2.346 6.334.037 4.33-2.02 5.967-2.102 6.03-.26.193-.366.53-.265.838.102.308.39.515.712.515h4.92c.102 2.31 1.997 4.16 4.33 4.16s4.226-1.85 4.327-4.16h4.922c.322 0 .61-.206.71-.514.103-.307-.003-.645-.263-.838zM12 20.478c-1.505 0-2.73-1.177-2.828-2.658h5.656c-.1 1.48-1.323 2.66-2.828 2.66zM4.38 16.32c.74-1.132 1.548-3.028 1.524-5.896-.018-2.16.644-3.982 1.913-5.267C8.91 4.05 10.397 3.437 12 3.43c1.603.008 3.087.62 4.18 1.728 1.27 1.285 1.933 3.106 1.915 5.267-.024 2.868.785 4.765 1.525 5.896H4.38z"
                            ></path>
                        </svg>
                        <span class="hidden xl:block ml-4 font-bold text-md">
                            Notifications
                        </span>
                    </x-sidebar-item>
                    <x-sidebar-item url="{{ route('profile.show', auth()->user()) }}"
                                    active="{{ request()->is('profile/' . auth()->user()->username) }}">
                        <svg fill="currentColor" viewBox="0 0 24 24" class="h-6 w-6">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 11.816c1.355 0 2.872-.15 3.84-1.256.814-.93 1.078-2.368.806-4.392-.38-2.825-2.117-4.512-4.646-4.512S7.734 3.343 7.354 6.17c-.272 2.022-.008 3.46.806 4.39.968 1.107 2.485 1.256 3.84 1.256zM8.84 6.368c.162-1.2.787-3.212 3.16-3.212s2.998 2.013 3.16 3.212c.207 1.55.057 2.627-.45 3.205-.455.52-1.266.743-2.71.743s-2.255-.223-2.71-.743c-.507-.578-.657-1.656-.45-3.205zm11.44 12.868c-.877-3.526-4.282-5.99-8.28-5.99s-7.403 2.464-8.28 5.99c-.172.692-.028 1.4.395 1.94.408.52 1.04.82 1.733.82h12.304c.693 0 1.325-.3 1.733-.82.424-.54.567-1.247.394-1.94zm-1.576 1.016c-.126.16-.316.246-.552.246H5.848c-.235 0-.426-.085-.552-.246-.137-.174-.18-.412-.12-.654.71-2.855 3.517-4.85 6.824-4.85s6.114 1.994 6.824 4.85c.06.242.017.48-.12.654z"
                            ></path>
                        </svg>
                        <span class="hidden xl:block ml-4 font-bold text-md">
                        Profile
                    </span>
                    </x-sidebar-item>
                @endauth
            </nav>

            @auth
                <div x-data="{ open: false }"
                     @click.outside="open = false"
                     class="w-14 xl:w-full mx-auto mt-auto flex flex-row justify-between mb-5 rounded-full hover:bg-blue-50 dark:hover:bg-dim-800 p-2 cursor-pointer transition duration-350 ease-in-out">
                    <button class="flex w-full justify-between" x-ref="button" @click="open = !open">
                        <div class="flex flex-row">
                            <img
                                class="w-10 h-10 rounded-full"
                                src="{{ auth()?->user()?->profile_photo_url }}"
                                alt="Photo of {{ auth()?->user()?->name }}"
                            />
                            <div class="hidden xl:block flex flex-col ml-2">
                                <h1 class="text-gray-800 dark:text-white font-bold text-sm">
                                    {{ auth()?->user()?->name }}
                                </h1>
                                <p class="text-gray-400 text-sm">
                                    {{ auth()?->user()?->username }}
                                </p>
                            </div>
                        </div>
                        <div class="hidden xl:block">
                            <div
                                class="flex items-center h-full text-gray-800 dark:text-white"
                            >
                                <svg
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    class="h-4 w-4 mr-2"
                                >
                                    <g>
                                        <path
                                            d="M20.207 8.147c-.39-.39-1.023-.39-1.414 0L12 14.94 5.207 8.147c-.39-.39-1.023-.39-1.414 0-.39.39-.39 1.023 0 1.414l7.5 7.5c.195.196.45.294.707.294s.512-.098.707-.293l7.5-7.5c.39-.39.39-1.022 0-1.413z"
                                        ></path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </button>
                    <div x-anchor.top-start.offset.10="$refs.button"
                         x-show="open"
                         class="hover:bg-gray-100  dark:hover:bg-dim-700 shadow-xl rounded-full border dark:border-gray-800 border-gray-50 w-11/12 top-2 bg-white p-4 dark:bg-dim-800"
                    >
                        <div class="w-full text-white">
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <a href="{{ route('logout') }}"
                                   class="text-black dark:text-white"
                                   @click.prevent="$root.submit()">
                                    Logout
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth

            @guest
                <div x-data="{ open: false }"
                     @click.outside="open = false"
                     class="w-14 p-2 xl:w-full mx-auto mt-auto flex flex-row justify-between mb-5 rounded-full hover:bg-blue-50 dark:hover:bg-dim-800 p-2 cursor-pointer transition duration-350 ease-in-out">
                    <a href="{{ route('login') }}" class="flex w-full justify-center bg-blue-400 dark:bg-dim-200 p-2 rounded-xl text-white" x-ref="button" @click="open = !open">
                        Login
                    </a>
                </div>
            @endguest
        </div>
    </div>
</div>
