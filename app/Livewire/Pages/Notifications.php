<?php

namespace App\Livewire\Pages;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Notifications extends Component
{
    #[Layout('layouts.app')]
    public function render(): View
    {
        return view('livewire.pages.notifications');
    }
}
