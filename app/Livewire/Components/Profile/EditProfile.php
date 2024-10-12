<?php

namespace App\Livewire\Components\Profile;

use App\Models\User;
use Livewire\Component;

class EditProfile extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.components.profile.edit-profile');
    }
}
