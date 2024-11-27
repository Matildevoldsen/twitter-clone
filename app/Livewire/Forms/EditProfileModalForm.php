<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class EditProfileModalForm extends Form
{
    #[Validate('required', 'string', 'max:255')]
    public string $name;

    #[Validate('required', 'string', 'max:350')]
    public string $description;

    #[Validate('required', 'string', 'max:350')]
    public string $website;

    #[Validate('required', 'string', 'max:255', 'unique:users,username')]

    public string $username;

    public $profile_photo_path;

    public $banner_path;
}
