<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ReplyForm extends Form
{
    #[Validate('required')]
    public string $body = '';

    public $images = null;
}
