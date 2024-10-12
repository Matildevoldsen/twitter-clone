<div class="dark:border-gray-800 border-gray-200">
    <div
        class="flex justify-start sticky border-b bg-white dark:bg-dim-900 border-l border-r border-gray-200 dark:border-gray-700">
        <div class="px-4 py-2 mx-2">
            <a href=""
               class=" text-2xl font-medium rounded-full text-blue-400 hover:bg-gray-800 hover:text-blue-300 float-right">
                <svg class="m-2 h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <g>
                        <path
                            d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z">
                        </path>
                    </g>
                </svg>
            </a>
        </div>
        <div class="mx-2">
            <h2 class="mb-0 text-xl font-bold text-gray-900 dark:text-white">
                {{ $user->username }}
                <p class="mb-0 w-48 text-xs text-gray-900 dark:text-gray-400">
                    {{ $user->tweets->count() }} Tweets
                </p>
            </h2>
        </div>
    </div>
    <div>
        <div class="w-full bg-cover bg-no-repeat bg-center"
             style="height: 200px; background-image: url('{{ $user->banner_path ?? 'https://via.placeholder.com/600x200' }}');">
            <img class="opacity-0 w-full h-full"
                 src="{{ $user->banner_path ?? 'https://via.placeholder.com/600x200' }}" alt="">
        </div>
        <div class="p-4">
            <div class="relative flex w-full">
                <div class="flex flex-1">
                    <div style="margin-top: -6rem;">
                        <div style="height:9rem; width:9rem;" class="md rounded-full relative avatar">
                            <img style="height:9rem; width:9rem;"
                                 class="border shadow md rounded-full relative border-4 border-gray-900"
                                 src="{{ $user->profile_photo_url }}" alt="Profile photo of {{ $user->name }}">
                            <div class="absolute"></div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col text-right">
                    @if ($user->id === auth()->user()->id)
                        <div class="flex flex-col text-right">
                            <button type="button"
                                    class="flex justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring max-w-max border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 items-center hover:shadow-lg font-bold py-2 px-4 rounded-full mr-0 ml-auto">
                                Edit Profile
                            </button>
                        </div>
                    @else
                        <button type="button"
                                class="flex justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring max-w-max border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 items-center hover:shadow-lg font-bold py-2 px-4 rounded-full mr-0 ml-auto">
                            Follow
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
