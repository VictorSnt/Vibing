<?php

namespace App\Livewire\User;

use Illuminate\Validation\ValidationException;
use App\Livewire\User\Forms\PasswordForm;
use App\Traits\NotificationTrait;
use Livewire\Attributes\On;
use Livewire\Component;


class Password extends Component
{
    use NotificationTrait;

    public PasswordForm $passwordForm;

    public function confirm_savePassword()
    {
        $this->dialog([
            'icon' => "question",
            'title' => __('local.atention'),
            'text' => __('local.reset-pass-msg')
        ], returnEventName: 'update::user::password::confirmed');
    }


    /**
     * all events ended in '::confirmed' initiate its lifecycle
     * on a confirm_{methodName} that trigger a confirmation
     * dialog modal to the user
     */
    #[On('update::user::password::confirmed')]
    public function savePassword()
    {
        try {
            $this->passwordForm->savePassword()
                ?
                $this->alert([
                    'icon' => "success",
                    'title' => __('local.Success')
                ])
                :
                $this->alert([
                    'icon' => "error",
                    'title' => __('Credencial Invalida')
                ]);
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            report($e);
            $this->notify([
                'icon' => "error",
                'title' => __('local.Error'),
                'text' => __('local.PasswordChangeFail')
            ]);
        }
    }

    public function render()
    {
        return view('livewire.user.password');
    }
}
