<?php

namespace App\Livewire\User;

use Illuminate\Validation\ValidationException;
use App\Livewire\User\Forms\RegisterForm;
use App\Traits\NotificationTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Register extends Component
{
    use NotificationTrait;

    public RegisterForm $registerForm;

    public function success($msg)
    {
        if (Auth::user() && Auth::user()->is_admin) {
            $this->dispatch('re-render::admin::userslist::view');
            $this->dispatch('close-modal');
            $this->alert(['icon' => 'success', 'title' => $msg]);
            return;
        } else {
            $this->notify([
                'icon' => "success",
                'title' => __('local.Success'),
                'text' => $msg
            ], nextPage: true);
            redirect()->route('login');
        }
    }

    public function fail($msg)
    {

        $this->notify([
            'icon' => "error",
            'title' => __('local.Error'),
            'text' => $msg
        ]);
    }

    public function store()
    {
        try {
            $this->registerForm->store();
            $this->success(msg: __('Cadastrado'));
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            report($e);
            $this->fail(msg: __('local.RegistrationFailed'));
        }
    }

    public function render()
    {
        return view('livewire.user.register');
    }
}
