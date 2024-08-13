<?php

namespace App\Livewire\User\Forms;

use App\Traits\ValidationTrait;
use Livewire\Form;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegisterForm extends Form
{
    use ValidationTrait;
    
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function store(): void
    {
        $data = $this->getValidData(asObj: false);
        DB::transaction(function () use ($data) {
            User::create($data);
        });
        $this->clearForm();
    }
}
