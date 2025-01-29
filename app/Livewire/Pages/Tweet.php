<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\On;
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

    #[On('addReply')]
    public function addReply($reply): void
    {
        if ($tweet = TweetModel::find($reply)) {
            $this->children->prepend($tweet);
        }
    }

    #[On('echo:tweets,TweetWasCreated')]
    public function listenForTweet($tweet): void
    {
        $tweet = \App\Models\Tweet::find($tweet['id']);

        if (!$tweet->parent_id) {
            return;
        }

        if ($tweet->parent_id === $this->tweet->id) {
            $this->children->prepend($tweet);
        }
    }

    public function render(): View
    {
        return view('livewire.pages.tweet');
    }
}
