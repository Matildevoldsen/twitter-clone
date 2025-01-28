<?php

namespace App\Livewire\Concerns;

trait IsComposing
{
    public function removeImage($index): void
    {
        if (isset($this->form->images[$index])) {
            unset($this->form->images[$index]);
        }
    }
}
