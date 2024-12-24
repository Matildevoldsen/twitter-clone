<?php

namespace App\Livewire\Components;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class WhoToFollow extends Component
{
    public $users;

    protected $listeners = ['updateWhoToFollow' => '$refresh'];

    public function mount(): void
    {
        $this->users = User::inRandomOrder()->whereNot('id', auth()->user()->id)->limit(3)->get();
    }

    public function placeholder(): View
    {
        return view('livewire.components.placeholder.who-to-follow');
    }

    public function toggleFollow(User $user): void
    {
        auth()->user()->toggleFollow($user);
        $this->dispatch('updateWhoToFollow');
    }

    public function render(): View
    {
        return view('livewire.components.who-to-follow');
    }
}
