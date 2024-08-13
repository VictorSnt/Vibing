<?php

namespace App\Livewire\Auth;

use App\Livewire\Auth\Forms\PasswordResetForm;
use Illuminate\Support\Facades\Password;
use App\Traits\NotificationTrait;
use Livewire\Component;


class ResetPassword extends Component
{
    use NotificationTrait;
    public PasswordResetForm $passwordResetForm;

    public function mount($token, $email) 
    {
        $this->passwordResetForm->token = $token;
        $this->passwordResetForm->email = $email;
    }

    public function savePassword()
    {
        $status = $this->passwordResetForm->passwordReset();
        if ($status === Password::PASSWORD_RESET) {
            $this->notify([
                'icon' => 'success',
                'title' => __('local.Passwd-Updated')
            ], nextPage: true);
            return redirect()->route('login');
        }else{
            $this->alert([
                'icon' => 'error',
                'title' => __('Oops'),
                'text' => __($status),
                'position' => 'center'
            ]);
        }
    }
    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
