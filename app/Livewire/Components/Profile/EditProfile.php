<?php

namespace App\Livewire\Components\Profile;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class EditProfile extends Component
{
    public User $user;
    protected $listeners = ['updateProfilePage' => '$refresh'];

    public function toggleFollow(): void
    {
        auth()->user()->toggleFollow($this->user);

        $this->dispatch('updateProfilePage');
    }

    public function render(): View
    {
        return view('livewire.components.profile.edit-profile');
    }
}
