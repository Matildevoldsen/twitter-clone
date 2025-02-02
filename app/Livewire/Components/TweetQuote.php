<?php

namespace App\Livewire\Components;

use App\Models\Tweet as TweetModel;
use Illuminate\View\View;
use Livewire\Component;

class TweetQuote extends Component
{
    public TweetModel $tweet;

    public function render(): View
    {
        return view('livewire.components.tweet-quote');
    }
}
