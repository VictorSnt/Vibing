<?php

namespace App\Livewire\User\Admin;

use App\Livewire\User\Forms\UpdateForm;
use App\Models\User;
use App\Traits\NotificationTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
    use NotificationTrait;

    
    public function success($msg)
    {
        $this->notify([
                'icon' => 'success',
                'title' => $msg,
        ], nextPage: true);
        redirect()->route('listusers-index');
    }


    public function fail($msg)
    {
        $this->alert([
            'icon' => "error",
            'title' => __('Erro'),
            'text' => $msg
        ]);
    }

    #[On('admin::toggle::confirmed')]
    public function toggleAdmin($userId = null)
    {
        if (!$userId) return;
        try {
            $is_admin = DB::transaction(function () use ($userId) {
                $user = User::findOrFail($userId);
                $user->is_admin = !$user->is_admin;

                $user->save();
                
                return $user->is_admin;
            });
            $this->success(
                msg: $is_admin ?
                    'O Usuario se tornou Admin'
                    :
                    'O Usuario não é mais Admin'
            );
        } catch (\Exception $e) {
            dd($e);
            $this->fail(msg: 'Falha ao mudar permissões');
        }
    }

    public function render()
    {
        return view('livewire.user.admin.update');
    }
}
