<?php

namespace App\Livewire\Components\Compose;

use App\Livewire\Forms\TweetComposeForm;
use Illuminate\View\View;
use Livewire\Component;

class Compose extends Component
{
    public TweetComposeForm $form;
    public function render(): View
    {
        return view('livewire.components.compose.compose');
    }
}
