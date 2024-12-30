<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class Notifications extends Component
{
    public function getNotifications(): Collection
    {
        return auth()->user()->notifications;
    }
    public function render(): View
    {
        return view('livewire.pages.notifications');
    }
}
