<x-twitter-modal wire:model="visible">
    <form wire:submit="submit">
        <div class="relative p-4 bg-white dark:bg-dim-900">
            <label for="banner_image" class="relative mb-6">
                <input type="file" wire:model="form.banner_path" id="banner_image"
                       class="absolute inset-0 opacity-0 w-full h-full cursor-pointer">
                @if ($this->form->banner_path)
                    <div class="h-36 bg-cover bg-center rounded-t-lg"
                         style="background-image: url('{{ $this?->form?->banner_path?->temporaryUrl() ?? '' }}');">
                        <div class="absolute inset-0 bg-black bg-opacity-25 flex items-center justify-center">
                            <span class="text-white text-sm">Change Banner</span>
                        </div>
                    </div>
                @else
                    <div class="h-36 bg-cover bg-center rounded-t-lg"
                         style="background-image: url('/{{ auth()->user()->banner_path ?? '' }}');">
                        <div class="absolute inset-0 bg-black bg-opacity-25 flex items-center justify-center">
                            <span class="text-white text-sm">Change Banner</span>
                        </div>
                    </div>
                @endif

                @error('form.banner_path')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </label>


            <!-- Profile Picture Upload -->
            <label for="profile_picture" class="absolute w-28 h-28 mx-auto -mt-14 mb-6">
                <input type="file" wire:model="form.profile_photo_path" id="profile_picture"
                       class="absolute inset-0 opacity-0 w-full h-full cursor-pointer">
                @if ($this->form->profile_photo_path)
                    <img class="w-full h-full rounded-full border-4 border-white dark:border-dim-900 object-cover"
                         src="{{ $this->form->profile_photo_path->temporaryUrl() }}"
                         alt="Profile Picture">
                @else
                    <img class="w-full h-full rounded-full border-4 border-white dark:border-dim-900 object-cover"
                         src="{{ auth()->user()->profile_photo_url ?? '' }}"
                         alt="Profile Picture">
                @endif
                <div class="absolute inset-0 bg-black bg-opacity-25 flex items-center justify-center rounded-full">
                    <span class="text-white text-sm"><i class="fas fa-camera"></i></span>
                </div>
            </label>


            <div class="mb-4 mt-20">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 w-full focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    type="text"
                    wire:model="form.name"
                    id="name"/>

                <x-input-error for="form.name"/>
            </div>

            <!-- Username Field -->
            {{-- <div class="mb-4">
                <label for="username"
                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                <input
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 w-full dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    type="text"
                    {{ $this->canUpdateUsername() ? '' : 'disabled' }}
                    wire:model="form.username"
                    id="username">
                @if (!$this->canUpdateUsername())
                    <small>
                        Your username can only be changed once every
                        {{ config('x.can_update_username_every') }} days.
                    </small>
                @endif
                <x-input-error for="form.username"/>
            </div> --}}

            <!-- Website Field -->
            <div class="mb-4">
                <label for="website"
                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">Website</label>
                <input
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 w-full dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    type="url"
                    wire:model="form.website"
                    id="website">
                <x-input-error for="form.website"/>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bio</label>
                <textarea wire:model="form.description"
                          id="description"
                          rows="3"
                          class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"></textarea>
                @error('form.description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex justify-end items-center p-4 border-t dark:border-dim-700">
            <button
                type="submit"
                class="ml-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                Save
            </button>
        </div>
    </form>
</x-twitter-modal>
