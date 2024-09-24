<?php

namespace App\Livewire\Components;

use App\Models\Tweet;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Timeline extends Component
{
    public Collection $tweets;

    public function mount(): void
    {
        $this->tweets = Tweet::whereNull('parent_id')->latest()->get();
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
