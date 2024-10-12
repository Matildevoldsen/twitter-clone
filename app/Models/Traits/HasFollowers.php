<?php

namespace App\Models\Traits;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasFollowers
{
    public function toggleFollow(User $user): void
    {
        if ($this->isFollowing($user)) {
            $this->following()->detach($user);
        } else {
            //notify user of new follower
            $this->following()->attach($user);
        }
    }

    public function following(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class, 'followers', 'follower_id', 'user_id'
        )->using(Follower::class)->withTimestamps();
    }

    public function isFollowing(User $user): bool
    {
        return $this->following()->where('user_id', $user->id)->exists();
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class, 'followers', 'user_id', 'follower_id'
        )->using(Follower::class)->withTimestamps();
    }
}
