<?php

namespace App\Livewire\Auth;

use App\Livewire\Auth\Forms\LoginForm;
use App\Traits\NotificationTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Login extends Component
{
    use NotificationTrait;

    public LoginForm $loginForm;

    public function authUser()
    {
        if ($this->loginForm->login()) {
            $this->notify([
                'icon' => 'success',
                'title' => __('local.Loged-in')
            ], nextPage: true);
            if (Auth::user()->is_admin) {
                redirect()->route('listusers-index');
                return;
            }
            redirect()->route('user-index');
        }else{
            $this->alert([
                'icon' => 'error',
                'title' => 'Oops',
                'text' => __('local.Invalid-Creds'), 
                'position' => 'center'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
