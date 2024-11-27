<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\EditProfileModalForm;
use App\Livewire\Traits\IsModal;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfileModal extends Component
{
    use WithFileUploads;
    use IsModal;

    public EditProfileModalForm $form;

    public function mount(): void
    {
        $user = auth()->user();

        $this->form->description = $user?->description ?? '';
        $this->form->website = $user?->website ?? '';
        $this->form->username = $user?->username ?? '';
        $this->form->name = $user?->name ?? '';
    }

    public function submit(): void
    {
        $this->form->validate();

        $user = auth()->user();

        if ($this->form->profile_photo_path) {
            if ($user->profile_photo_path) {
                Storage::delete($user->profile_photo_path);
            }

            $path = $this->form->profile_photo_path->store('profile-photos', 'public');
            $user->update(['profile_photo_path' => $path]);
        }

        if ($this->form->banner_path) {
            if ($user->banner_path) {
                Storage::delete($user->banner_path);
            }

            $path = $this->form->banner_path->store('banner-photos', 'public');
            $user->update(['banner_path' => $path]);
        }

        $originalUserName = $user->username;
        $user->update([
            'name' => $this->form->name,
            'website' => $this->form->website,
            'username' => $this->form->username,
            'description' => $this->form->description,
        ]);

        if ($this->form->username !== $originalUserName) {
            $this->redirect(route('profile.show', $user->username));
        }

        $this->dispatch('updateProfilePage');
        $this->hide();
    }

    public function render(): View
    {
        return view('livewire.modals.edit-profile-modal');
    }
}
