<?php

namespace App\Events;

use App\Models\Tweet;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TweetWasCreated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Tweet $tweet)
    {
    }


    public function broadcastWith(): array
    {
        return [
            'id' => $this->tweet->id,
        ];
    }


    public function broadcastOn(): array
    {
        return [
            new Channel('tweets'),
        ];
    }
}
