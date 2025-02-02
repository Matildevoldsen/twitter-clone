<?php

namespace App\Livewire\Components\Tweets;

use Illuminate\View\View;
use Livewire\Component;
use App\Models\Tweet as TweetModel;

class Tweet extends Component
{
    public TweetModel $tweet;
    public bool $reply = false;
    public bool $first = false;
    public bool $last = false;

    public function getTweetUrl(): string
    {
        if ($this->tweet->originalTweet && $this->tweet->content) {
            return route('tweet.show', $this->tweet);
        }

        return route('tweet.show', $this->tweet->originalTweet);
    }

    public function render(): View
    {
        return view('livewire.components.tweets.tweet');
    }
}
