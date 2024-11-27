<?php

namespace App\Livewire\Traits;

use Livewire\Attributes\On;

trait IsModal {
    public bool $visible = false;

    #[On('show')]
    public function show(): void
    {
        $this->visible = true;
    }

    #[On('hide')]
    public function hide(): void
    {
        $this->visible = false;
    }

}
