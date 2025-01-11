<?php

namespace App\Livewire\Components\WhoToFollow;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class UserList extends Component
{
    public $users;
    public int $limit = 3;

    public function mount(): void
    {
        $this->users = User::inRandomOrder()
            ->whereNot('id', auth()->user()?->id)->
            limit($this->limit)
            ->get();
    }

    public function toggleFollow(User $user): void
    {
        auth()->user()->toggleFollow($user);
        $this->dispatch('updateWhoToFollow');
    }


    public function render(): View
    {
        return view('livewire.components.who-to-follow.user-list');
    }
}
