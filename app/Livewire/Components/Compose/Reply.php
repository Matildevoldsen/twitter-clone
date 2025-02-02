<?php

namespace App\Livewire\Components\Compose;

use App\Events\ReplyCountUpdated;
use App\Events\TweetWasCreated;
use App\Livewire\Concerns\IsComposing;
use App\Livewire\Forms\ReplyForm;
use App\TweetType;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Tweet as TweetModel;

class Reply extends Component
{
    use WithFileUploads;
    use IsComposing;

    public TweetModel $reply;
    public ReplyForm $form;

    public function tweet(): void
    {
        $parent = $this->reply->id;
        if ($this->reply->originalTweet) {
            $parent = $this->reply->originalTweet->id;
        }

        $tweet = auth()->user()->tweets()->create([
            'body' => $this->form->body,
            'type' => TweetType::TWEET,
            'parent_id' => $parent
        ]);

        if(!empty($this->form->images)) {
            foreach ($this->form->images as $image) {
                $tweet->addMedia($image)
                    ->toMediaCollection();
            }
        }

        broadcast(new TweetWasCreated($tweet))->toOthers();
        broadcast(new ReplyCountUpdated($tweet))->toOthers();

        $this->form->reset();
        $this->dispatch(event: 'addReply', reply: $tweet->id);
    }

    public function render(): View
    {
        return view('livewire.components.compose.reply');
    }
}
