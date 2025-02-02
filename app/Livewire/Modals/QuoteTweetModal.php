<?php

namespace App\Livewire\Modals;

use App\Events\TweetCreated;
use App\Events\TweetWasCreated;
use App\Livewire\Concerns\IsComposing;
use App\Livewire\Forms\TweetComposeForm;
use App\Models\Tweet;
use App\TweetType;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class QuoteTweetModal extends Component
{
    use WithFileUploads;
    use IsComposing;

    public bool $visible = true;
    public Tweet $tweet;
    public TweetComposeForm $form;

    public function quote(): void
    {
        $this->form->validate();

        $tweet = auth()->user()->tweets()->create([
            'body' => $this->form->body,
            'type' => TweetType::QUOTE,
            'original_tweet_id' => $this->tweet->id
        ]);


        if (!empty($this->form->images)) {
            foreach ($this->form->images as $image) {
                $tweet->addMedia($image)
                    ->toMediaCollection();
            }
        }

        broadcast(new TweetWasCreated($tweet))->toOthers();

        $this->form->reset();
        $this->dispatch('closeQuoteModal');
        $this->redirect(url: route('home'));
    }

    public function render(): View
    {
        return view('livewire.modals.quote-tweet-modal');
    }
}
