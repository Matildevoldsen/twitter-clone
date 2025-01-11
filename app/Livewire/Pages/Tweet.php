<?php

namespace App\Livewire\Pages;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use App\Models\Tweet as TweetModel;
class Tweet extends Component
{
    public TweetModel $tweet;
    public Collection $parents;
    public Collection $children;

    public function mount(): void
    {
        $this->parents = collect($this->tweet->ancestorsAndSelf->sortBy('created_at'));
        $this->children = collect($this->tweet->replies->sortBy('created_at'));
    }

    public function getParents()
    {
        return $this->parents;
    }

    public function getReplies(): Collection
    {
        return $this->children;
    }

    public function render(): View
    {
        return view('livewire.pages.tweet');
    }
}
