<?php

namespace App\Models\Traits;

use App\Events\RetweetCountUpdated;
use App\Events\TweetWasCreated;
use App\Models\Tweet;
use App\Notifications\RetweetNotification;
use App\TweetType;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasRetweets
{
    public function retweets(): HasMany
    {
        return  $this->hasMany(Tweet::class, 'original_tweet_id');
    }

    public function originalTweet(): HasOne
    {
        return $this->hasOne(Tweet::class, 'id', 'original_tweet_id');
    }

    public function createRetweet(): ?Tweet
    {
        $tweet = $this->retweets()->create([
            'user_id' => auth()->id(),
            'type' => TweetType::RETWEET
        ]);

        $this->notifyUserOfTweets($tweet);

        return $tweet;
    }

    public function deleteRetweet(Tweet $tweet): void
    {
        $tweet->delete();
    }

    private function notifyUserOfTweets(Tweet $tweet): void
    {
        broadcast(new TweetWasCreated($tweet))->toOthers();
        broadcast(new RetweetCountUpdated($this))->toOthers();

        if (auth()->user()->id !== $this->user_id) {
            $this->tweet->user->notify(new RetweetNotification($tweet));
        }
    }
}
