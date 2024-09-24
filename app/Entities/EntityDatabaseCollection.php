<?php

namespace App\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class EntityDatabaseCollection extends Collection
{
    public function users(): Collection
    {
        return User::whereIn('username', $this->pluck('body_plain'))->get();
    }
}
