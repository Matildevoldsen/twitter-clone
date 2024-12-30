<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class FollowerList extends Component
{
    public function render(): View
    {
        return view('livewire.pages.follower-list');
    }
}
