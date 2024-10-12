<?php

namespace App\Livewire\Components\Tweets;

use App\Events\TweetLikesUpdated;
use Illuminate\Support\Number;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Tweet as TweetModel;
class TweetActions extends Component
{
    public TweetModel $tweet;
    protected $listeners = ['tweetUpdated' => '$refresh'];
    public function like(): void
    {
        if (auth()->user()->hasLiked($this->tweet)) {
            return;
        }

        auth()->user()->likes()->create([
            'tweet_id' => $this->tweet->id
        ]);

        // broadcast
        broadcast(new TweetLikesUpdated($this->tweet))->toOthers();

        // notify
    }

    public function dislike(): void
    {
        auth()->user()->likes()->where('tweet_id', $this->tweet->id)->delete();
        broadcast(new TweetLikesUpdated($this->tweet))->toOthers();
    }

    #[On('echo:tweets,TweetLikesUpdated')]
    public function getLikes(): int|string
    {
        $this->dispatch('tweetUpdated');
        return Number::abbreviate($this->tweet->likes->count());
    }


    public function render(): View
    {
        return view('livewire.components.tweets.tweet-actions');
    }
}
