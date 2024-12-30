<?php

namespace App\Livewire\Components\WhoToFollow;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class WhoToFollow extends Component
{

    protected $listeners = ['updateWhoToFollow' => '$refresh'];

    public function placeholder(): View
    {
        return view('livewire.components.placeholder.who-to-follow');
    }

    public function render(): View
    {
        return view('livewire.components.WhoToFollow.who-to-follow');
    }
}
