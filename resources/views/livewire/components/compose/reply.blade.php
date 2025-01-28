<form
    x-data="{
        expand: false,
        body: $wire.entangle('form.body'),
        radios: 30,
        maxLength: 280,
        get percentage() {
            return Math.round((this.body.length * 100) / this.maxLength);
        },
        get displayPercentage() {
            return this.percentage <= 100 ? this.percentage : 100;
        },
        get dash() {
            return 2 * Math.PI * this.radius;
        },
        get offset() {
            let circ = this.dash;
            let progress = this.displayPercentage / 100;

            return circ * (1 - progress);
        },
        get percentageIsOver() {
            return this.percentage > 100;
        },
        resetForm() {
            this.body = '';
            this.images = [];
        },
        reply() {
            this.$wire.tweet().then(() => {
                this.resetForm();
            });
        },
        removeImage(index) {
            this.images.splice(index, 1);
            this.$wire.call('removeImage', index);
        },
        renderImage(image) {
            if (typeof image === 'string') {
                return image;
            }
            if (image instanceof File) {
                return URL.createObjectURL(image);
            }
            return '';
        }
    }"
    x-on:click.outside="expand = false"
    :class="{ 'p-6': expand }"
    class="border-b border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer duration-350 ease-in-out border-l border-r p-4 transition-all duration-300">
    <div class="flex items-start space-x-4">
        <img
            src="{{ auth()?->user()?->profile_photo_url }}"
            class="w-10 h-10 rounded-full"
            alt="Photo of {{ auth()?->user()?->profile_photo_url }}">
        <div class="flex-1">
            <textarea
                name="reply"
                @focus="expand = true"
                id="reply"
                x-ref="textarea"
                placeholder="Reply to {{ $reply?->user?->name ?? 'post' }}"
                x-auto-resize
                class="w-full text-gray-900 min-h-24 bg-white dark:bg-gray-900 dark:text-white border-none focus:ring-0 resize-none rounded-lg p-2 transition-all duration-300 h-10"
            ></textarea>
            <div x-show="images" class="w-full flex flex-wrap p-2">
                @if ($this->form->images)
                    @foreach($this->form->images as $image)
                        <div class="relative m-1">
                            <img src="{{ $image->temporaryUrl() }}"
                                 class="w-20 h-20 object-cover rounded-md"
                                 alt="Image Preview">
                            <button
                                wire:click="removeImage({{ $loop->index }})"
                                type="button"
                                class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 text-xs"
                            >
                                x
                            </button>
                        </div>
                    @endforeach
                @endif
            </div>
            <div x-show="expand" class="flex items-center justify-between mt-2 transition-all duration-300">
                <label
                    for="images"
                    class="text-blue-400 hover:bg-blue-50 dark:hover:bg-dim-800 rounded-full p-2"
                >
                    <svg viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor">
                        <g>
                            <path
                                d="M19.75 2H4.25C3.01 2 2 3.01 2 4.25v15.5C2 20.99 3.01 22 4.25 22h15.5c1.24 0 2.25-1.01 2.25-2.25V4.25C22 3.01 20.99 2 19.75 2zM4.25 3.5h15.5c.413 0 .75.337.75.75v9.676l-3.858-3.858c-.14-.14-.33-.22-.53-.22h-.003c-.2 0-.393.08-.532.224l-4.317 4.384-1.813-1.806c-.14-.14-.33-.22-.53-.22-.193-.03-.395.08-.535.227L3.5 17.642V4.25c0-.413.337-.75.75-.75zm-.744 16.28l5.418-5.534 6.282 6.254H4.25c-.402 0-.727-.322-.744-.72zm16.244.72h-2.42l-5.007-4.987 3.792-3.85 4.385 4.384v3.703c0 .413-.337.75-.75.75z"
                            ></path>
                            <circle cx="8.868" cy="8.309" r="1.542"></circle>
                        </g>
                    </svg>
                    <input
                        type="file"
                        multiple
                        id="images"
                        wire:model="form.images"
                        class="hidden"
                    />
                </label>
                <div x-show="body.length > 0" class="h-10 w-10 relative">
                    <svg class="transform -rotate-90" viewBox="0 0 120 120">
                        <circle
                            cx="60"
                            cy="60"
                            fill="none"
                            stroke-width="8"
                            :r="radius"
                            class="stroke-current text-gray-700"
                        />

                        <circle
                            cx="60"
                            cy="60"
                            fill="none"
                            stroke-width="8"
                            :r="radius"
                            class="stroke-current text-blue-500"
                            :stroke-dasharray="dash"
                            :stroke-dashoffset="offset"
                            :class="{
                            '!text-red-500': percentageIsOver,
                        }"
                        />
                    </svg>
                </div>
                <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded-full">Reply</button>

            </div>
        </div>
    </div>
</form>
