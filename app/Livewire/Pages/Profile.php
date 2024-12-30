<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class Profile extends Component
{
    public User $user;

    public function render(): View
    {
        return view('livewire.pages.profile');
    }
}
