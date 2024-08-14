<?php

namespace App\Livewire\User\Forms;

use Livewire\Form;
use App\Models\User;
use App\Traits\ValidationTrait;
use Illuminate\Support\Facades\DB;

class UpdateForm extends Form
{
    use ValidationTrait;

    public string $name;
    public string $email;

    protected function rules(): array
    {
        return [
            'name' => 'nullable|max:255',
            'email' => 'nullable|email|max:255|unique:users'
        ];
    }

    public function update(User $user): void
    {
        $data = $this->getValidData(asObj: false);
        DB::transaction(function () use ($data, $user) {
            $user->update($data);
        });
        $this->clearForm();

    }
}
