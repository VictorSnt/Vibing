<?php

namespace App\Livewire\Auth;

use App\Livewire\Auth\Forms\PasswordLinkForm;
use Illuminate\Support\Facades\Password;
use App\Traits\NotificationTrait;
use Livewire\Component;


class ResetPasswordLink extends Component
{
    use NotificationTrait;
    
    public PasswordLinkForm $passwordLinkForm;

    public function sendResetLink()
    {
        $status = $this->passwordLinkForm->sendLink();
        if ($status === Password::RESET_LINK_SENT) {
            $this->alert([
                'icon' => 'success',
                'title' => __('local.Success'),
                'text' => __($status),
                'position' => 'center'
            ]);
        } else {
            $this->alert([
                'icon' => 'error',
                'text' => __($status),
                'position' => 'center'
            ]);
        }
    }
    public function render()
    {
        return view('livewire.auth.reset-password-link');
    }
}
