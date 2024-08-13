<?php

namespace App\Livewire\Auth\Forms;


use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PasswordLinkForm extends Form
{
    #[Rule('required|email|max:255')]
    public string $email;

    public function sendLink()
    {
        $fields = $this->validate();
        return (Password::sendResetLink(
            $fields
        ));
    }
}
