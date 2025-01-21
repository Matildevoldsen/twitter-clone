<?php

namespace App\Livewire\Components\Compose;

use App\Livewire\Forms\ReplyForm;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Tweet as TweetModel;

class Reply extends Component
{
    use WithFileUploads;
    public TweetModel $reply;
    public ReplyForm $form;
    public function render()
    {
        return view('livewire.components.compose.reply');
    }
}
