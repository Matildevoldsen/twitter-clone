<x-twitter-modal wire:model="visible">
    <form
        x-data="form"
        @submit.prevent="postQuote"
        class=" pb-4"
    >
        <div class="flex flex-shrink-0 p-4 pb-0">
            <div class="w-12 flex items-top">
                <img src="{{ auth()->user()->profile_photo_url }}"
                     class="inline-block h-10 w-10 rounded-full"
                     alt="Photo of {{ auth()->user()->name }}">
            </div>
            <div class="w-full p-2">
                <textarea
                    x-ref="textarea"
                    x-model="body"
                    x-auto-resize
                    @input="() => { }"
                    x-text-limit="280"
                    class="dark:text-white min-h-[64px] ring-0 focus:ring-0 text-gray-900 placeholder-gray-400 w-full h-10 bg-transparent border-0 focus:outline-none resize-none"
                    placeholder="What's happening?"
                ></textarea>
                @error('form.body')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="w-full flex flex-wrap p-2 pl-14">
            @if ($this->form->images)
                @foreach($this->form->images as $image)
                    <div class="relative m-1">
                        <img src="{{$image->temporaryUrl()}}" alt="Image Preview"
                             class="w-20 h-20 object-cover rounded-md"/>
                        <button
                            wire:click="removeImage({{ $loop->index }})"
                            type="button"
                            class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 text-xs"
                        >
                            &times;
                        </button>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="p-4 rounded-lg">
            <livewire:components.tweet-quote :tweet="$tweet"/>
        </div>
        <div class="w-full flex items-top p-2 text-white dark:border-gray-700 border-gray-50  border-t">
            <div class="flex-grow mt-2 flex justify-between">
                <label
                    for="qimages"
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
                        id="qimages"
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
                            r="30"
                            class="stroke-current text-gray-700"
                        />
                        <circle
                            cx="60"
                            cy="60"
                            fill="none"
                            stroke-width="8"
                            r="30"
                            class="stroke-current"
                            :class="percentage > 100 ? 'text-red-500' : 'text-blue-500'"
                            :stroke-dasharray="dash"
                            :stroke-dashoffset="offset"
                        />
                    </svg>
                </div>
            </div>

            <button
                type="submit"
                class="bg-blue-400 mt-2 hover:bg-blue-500 text-white rounded-full py-1 px-4 ml-auto mr-1"
            >
                <span class="font-bold text-sm">Tweet</span>
            </button>
        </div>
    </form>
</x-twitter-modal>
@script
<script>
    Alpine.data('form', () => {
        return {
            body: $wire.entangle('form.body'),
            radius: 30,
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
                this.updateCircleData();
            },
            postQuote() {
                this.$wire.quote().then(() => {
                    this.resetForm();
                });
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
        }
    })
</script>
@endscript
