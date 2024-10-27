<?php

namespace App\Notifications;

use App\Models\Tweet;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class RetweetNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    use Queueable;

    public function __construct(protected Tweet $retweet)
    {}

    public function via($notifiable): array
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable): array
    {
        return [
            'retweet_id' => $this->retweet->id,
            'original_tweet' => $this->retweet->originalTweet->id,
            'user_id' => $this->retweet->user_id,
            'action' => 'retweet',
        ];
    }

    public function toBroadcast($notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'retweet_id' => $this->retweet->id,
            'user_id' => $this->retweet->user_id,
            'action' => 'retweet',
        ]);
    }
}
