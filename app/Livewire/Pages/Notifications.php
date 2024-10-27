<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Notifications extends Component
{
    public function getNotifications(): Collection
    {
        return auth()->user()->notifications;
    }
    #[Layout('layouts.app')]
    public function render(): View
    {
        return view('livewire.pages.notifications');
    }
}
