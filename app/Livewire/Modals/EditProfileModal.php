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
        //$this->form->username = $user?->username ?? '';
        $this->form->name = $user?->name ?? '';
    }

    public function submit(): void
    {
        $this->form->validate();

        $user = auth()->user();

        // if (!$this->canUpdateUsername()) {
        //     $this->form->addError('username', 'You can only update your username once every ' . config('x.can_update_username_every') . ' days.');

        //     return;
        // }

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

        //$originalUserName = $user->username;

        $user->name = $this->form->name;
        $user->website = $this->form->website;
        //$user->username = $this->form->username;
        $user->description = $this->form->description;

        $user->save();

        // if ($this->form->username !== $originalUserName) {
        //     $this->redirect(route('profile.show', $user->username));
        // }

        $this->dispatch('updateProfilePage');
        $this->hide();
    }

    public function canUpdateUsername(): bool
    {
        return auth()->user()->username_last_updated_at?->diffInDays(now()) >= config('x.can_update_username_every');
    }

    public function render(): View
    {
        return view('livewire.modals.edit-profile-modal');
    }
}
