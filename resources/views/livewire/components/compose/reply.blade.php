<form
    class="border-b border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer duration-350 ease-in-out border-l border-r p-4 transition-all duration-300">
    <div class="flex items-start space-x-4">
        <img
            src="{{ auth()?->user()?->profile_photo_url }}"
            class="w-10 h-10 rounded-full"
            alt="Photo of {{ auth()?->user()?->profile_photo_url }}">

        <div class="flex-1">
            <textarea
                name=""
                id="reply"
                x-ref="textarea"
                x-auto-resize
                class="w-full text-gray-900 min-h-24 bg-white dark:bg-gray-900 dark:text-white border-none focus:ring-0 resize-none rounded-lg p-2 transition-all duration-300 h-10"
            ></textarea>
        </div>
    </div>
</form>
