<?php

namespace App\Livewire\Components\Tweets;

use Illuminate\Support\Number;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Tweet as TweetModel;
class RetweetAction extends Component
{
    public TweetModel $tweet;

    #[On('echo:tweets,RetweetCountUpdated')]
    public function getRetweetCount(): string|int
    {
        return Number::abbreviate($this->tweet->retweets->count());
    }

    public function render(): View
    {
        return view('livewire.components.tweets.retweet-action');
    }
}
