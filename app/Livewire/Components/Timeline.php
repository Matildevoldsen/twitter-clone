<?php

namespace App\Livewire\Components;

use App\Models\Tweet;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Timeline extends Component
{
    public array $chunks = [];
    public int $page = 1;
    public int $chunkSize = 10;

    public function mount(): void
    {
        $this->chunks = Tweet::whereNull('parent_id')
            ->latest()->pluck('id')->chunk($this->chunkSize)->toArray();
    }

    public function hasMorePages(): bool
    {
        return $this->page < count($this->chunks);
    }

    public function loadMore(): void
    {
        if (!$this->hasMorePages()) {
            return;
        }

        $this->page = $this->page + 1;
    }

    #[On('echo:tweets,TweetWasCreated')]
    public function listenForTweet($tweet): void
    {
        $tweet = Tweet::find($tweet['id']);
        if ($tweet) {
            $this->tweets->prepend($tweet);
        }
    }

    #[On('echo:tweets,TweetWasDeleted')]
    public function listenForDeletedTweets($tweet): void
    {
        $tweet = Tweet::find($tweet['id']);

        if ($tweet) {
            $this->tweets = $this->tweets->reject(function ($t) use ($tweet) {
                return $t->id === $tweet->id;
            });
        }
    }

    #[On('addTweet')]
    public function addTweet($tweetId): void
    {
        $tweet = Tweet::find($tweetId);

        if ($tweet) {
            $this->tweets->prepend($tweet);
        }
    }

    #[On('deleteTweet')]
    public function deleteTweet($tweetId): void
    {
        $tweet = Tweet::find($tweetId);

        if ($tweet) {
            $this->tweets = $this->tweets->reject(function ($t) use ($tweet) {
                return $t->id === $tweet->id;
            });
        }
    }

    public function render(): View
    {
        return view('livewire.components.timeline');
    }
}
