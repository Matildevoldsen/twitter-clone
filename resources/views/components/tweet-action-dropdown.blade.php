<div x-data="{ open: false }" class="relative">
    <button x-ref="button" @click="open = !open" class="flex">
        {{ $trigger }}
    </button>
    <template x-if="true">
        <div class="absolute dark:bg-gray-900 bg-gray-100 z-50 rounded-lg w-56 overflow-hidden shadow"
             x-show="open"
             x-cloak
             x-anchor="$refs.button"
             @click="open = !open"
             @click.outside="open = false"
             x-transition:enter.duration.400ms
             x-transition:leave.duration.500ms
        >
            {{ $slot }}
        </div>
    </template>
</div>
