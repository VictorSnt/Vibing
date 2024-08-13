<?php

namespace App\Livewire\User;

use Illuminate\Validation\ValidationException;
use App\Livewire\User\Forms\PasswordForm;
use App\Livewire\User\Forms\UpdateForm;
use Illuminate\Support\Facades\Auth;
use App\Traits\NotificationTrait;
use Livewire\Attributes\On;
use Livewire\Component;


class Update extends Component
{
    use NotificationTrait;


    public UpdateForm $updateForm;
    public PasswordForm $passwordForm;
    public $userId;


    public function mount()
    {
        $user = Auth::user();
        $this->userId = $user->id;
        $this->updateForm->name = $user->name;
    }

    public function success($msg)
    {
        $this->clearForm();
        $this->alert([
            'icon' => 'success',
            'title' => $msg,
        ]);
        $this->dispatch('user::updated');
    }

    public function fail($msg)
    {
        $this->alert([
            'icon' => "error",
            'title' => __('Erro'),
            'text' => $msg
        ]);
    }

    public function confirm_update()
    {
        $this->dialog([
            'icon' => "warning",
            'title' => __('local.atention'),
            'text' => __('local.update-warning')
        ], returnEventName: 'update::user::confirmed');
    }

    /**
     * all events ended in '::confirmed' initiate its lifecycle
     * on a confirm_{methodName} that trigger a confirmation
     * dialog modal to the user
     */
    
    #[On('update::user::confirmed')]
    public function update()
    {
        try {
            $this->updateForm->update($this->userId);
            $this->success(msg: __('local.Success'));
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            report($e);
            $this->fail(msg: __('local.RegistrationFailed'));
        }
    }

    #[On('user::updated')]
    public function render()
    {
        return view('livewire.user.update');
    }
}
