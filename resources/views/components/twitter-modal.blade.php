<div
    x-data="{ visible: @entangle($attributes->wire('model')), now: null }"
    x-show="visible"
    x-trap.inert.noscroll="visible"
    class="relative"
    :style="`z-index: ${now}`"
    x-on:keydown.escape.window="Livewire.dispatchTo('{{ $this->getName() }}', 'hide')">
    <div x-show="visible"
         class="fixed w-full h-full inset-0 bg-gray-900 backdrop-blur bg-opacity-50 z-50"
         x-transition.opacity.duration.300ms
         x-on:click="Livewire.dispatchTo('{{ $this->getName() }}', 'hide')">

    </div>
    <div x-show="visible"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-out duration-300"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-90"
         class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="bg-white dark:bg-dim-900 rounded-xl shadow-lg max-w-lg w-full mx-2">

            {{ $slot }}
        </div>
    </div>
</div>
