<?php

namespace App\Livewire\Auth\Forms;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Form;

class LoginForm extends Form
{
    #[Rule('required|email|max:255')]
    public string $email = '';

    #[Rule('required|min:6')]
    public string $password = '';
    public bool $remember = false;

    public function login(): bool
    {
        $fields = $this->validate();
        return Auth::attempt($fields, $this->remember);
    }
}
