<?php

namespace App\Livewire\Components;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class WhoToFollow extends Component
{
    public $users;

    public function mount(): void
    {
        $this->users = User::inRandomOrder()->limit(3)->get();
    }

    public function render(): View
    {
        return view('livewire.components.who-to-follow');
    }
}
