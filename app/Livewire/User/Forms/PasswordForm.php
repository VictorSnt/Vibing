<?php

namespace App\Livewire\User\Forms;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Traits\ValidationTrait;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Form;

class PasswordForm extends Form
{
    use ValidationTrait;

    public string $currentPassword = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected function rules(): array
    {
        return [
            'currentPassword' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
        ];
    }
    
    public function savePassword(): bool
    {
        $data = $this->getValidData();
        $isSaved = DB::transaction(function () use ($data) {
            /** @var User|null $user */
            $user = User::findOrFail(Auth::user()->id);
            if (Hash::check($data->currentPassword, $user->password)) {
                $user->password = Hash::make($data->password);
                $user->save();
                return true;
            }
            return false;
        });
        
        if($isSaved) $this->clearForm();
        return $isSaved;
    }
}
