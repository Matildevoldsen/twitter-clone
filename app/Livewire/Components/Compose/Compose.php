<?php

namespace App\Livewire\Components\Compose;

use App\Events\TweetWasCreated;
use App\Livewire\Forms\TweetComposeForm;
use App\TweetType;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class Compose extends Component
{
    use WithFileUploads;

    public TweetComposeForm $form;

    public function tweet(): void
    {
        $this->form->validate();

        $tweet = auth()->user()->tweets()->create([
            'body' => $this->form->body,
            'type' => TweetType::TWEET
        ]);

        if (!empty($this->form->images)) {
            foreach ($this->form->images as $image) {
                $tweet->addMedia($image)
                    ->toMediaCollection();
            }
        }

        broadcast(new TweetWasCreated($tweet))->toOthers();

        $this->form->reset();
        $this->dispatch(event: 'addTweet', tweetId: $tweet->id);
    }

    public function removeImage($index): void
    {
        if (isset($this->form->images[$index])) {
            unset($this->form->images[$index]);
        }
    }
    public function render(): View
    {
        return view('livewire.components.compose.compose');
    }
}
