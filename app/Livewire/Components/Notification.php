<?php

namespace App\Livewire\Components;

use App\Models\Tweet;
use App\Models\User;
use App\Notifications\FollowNotification;
use App\Notifications\LikeNotification;
use App\Notifications\RetweetNotification;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\View\View;
use Livewire\Component;

class Notification extends Component
{
    public DatabaseNotification $notification;

    public function mount(): void
    {
        $this->notification->markAsRead();
    }

    public function getTweet(): Tweet
    {
        if ($this->notification->type == RetweetNotification::class) {
            return Tweet::find($this->notification->data['original_tweet'])->originalTweet;
        }

        return Tweet::find($this->notification->data['retweet_id'])->originalTweet;
    }

    public function getIcon(): string
    {
        if ($this->notification->type == RetweetNotification::class) {
            return '
             <svg
                viewBox="0 0 24 24"
                fill="currentColor"
                class="w-5 h-5 mr-2 text-green-500">
                <g>
                <path d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"></path>
                </g>
            </svg>
            ';
        }

        if ($this->notification->type == FollowNotification::class) {
            return '
                <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" class="w-5 h-5 mr-2 text-blue-500"><g><path d="M17.863 13.44c1.477 1.58 2.366 3.8 2.632 6.46l.11 1.1H3.395l.11-1.1c.266-2.66 1.155-4.88 2.632-6.46C7.627 11.85 9.648 11 12 11s4.373.85 5.863 2.44zM12 2C9.791 2 8 3.79 8 6s1.791 4 4 4 4-1.79 4-4-1.791-4-4-4z"></path></g></svg>
            ';
        }

        if ($this->notification->type == LikeNotification::class)  {
            return '
            <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" width="800px" height="800px"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14 20.408c-.492.308-.903.546-1.192.709-.153.086-.308.17-.463.252h-.002a.75.75 0 01-.686 0 16.709 16.709 0 01-.465-.252 31.147 31.147 0 01-4.803-3.34C3.8 15.572 1 12.331 1 8.513 1 5.052 3.829 2.5 6.736 2.5 9.03 2.5 10.881 3.726 12 5.605 13.12 3.726 14.97 2.5 17.264 2.5 20.17 2.5 23 5.052 23 8.514c0 3.818-2.801 7.06-5.389 9.262A31.146 31.146 0 0114 20.408z"/>
                    </svg>
            ';
        }
    }

    public function getUser(): User
    {
        return User::find($this->notification->data['user_id']);
    }

    public function render(): View
    {
        return view('livewire.components.notification');
    }
}
