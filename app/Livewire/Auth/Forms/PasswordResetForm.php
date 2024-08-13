<?php

namespace App\Livewire\Auth\Forms;


use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Illuminate\Support\Str;
use Livewire\Form;


class PasswordResetForm extends Form
{
    #[Rule('required|email')]
    public $email;

    #[Rule('required')]
    public $token;
    
    #[Rule('required|min:6|confirmed')]
    public $password;

    #[Rule('required')]
    public $password_confirmation;

    public function passwordReset()
    {
        $fields = $this->validate();
        $this->reset();
        return (Password::reset(
            $fields,
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();
                event(new PasswordReset($user));
            }
        ));
    }
}
