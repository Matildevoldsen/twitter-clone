<?php

namespace App\Notifications;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LikeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected Tweet $tweet, protected User $user)
    {}

    public function via($notifiable): array
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable): array
    {
        return [
            'retweet_id' => $this->tweet->id,
            'user_id' => $this->user->id,
            'action' => 'like',
        ];
    }

    public function toBroadcast($notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'retweet_id' => $this->tweet->id,
            'user_id' => $this->user->id,
            'action' => 'like',
        ]);
    }
}
