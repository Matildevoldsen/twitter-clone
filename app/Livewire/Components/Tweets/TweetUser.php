<?php

namespace App\Livewire\Components\Tweets;

use Illuminate\View\View;
use Livewire\Component;
use App\Models\Tweet as TweetModel;

class TweetUser extends Component
{
    public TweetModel $tweet;

    public function render(): View
    {
        return view('livewire.components.tweets.tweet-user');
    }
}
