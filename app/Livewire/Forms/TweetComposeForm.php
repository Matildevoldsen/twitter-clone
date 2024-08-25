<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class TweetComposeForm extends Form
{
    #[Validate('max:280')]
    public string $body = '';

    public $images = null;
}
