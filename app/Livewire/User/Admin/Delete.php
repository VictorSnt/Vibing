<?php

namespace App\Livewire\User\Admin;

use App\Exceptions\UserHasInteractionsException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use App\Traits\NotificationTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\User;


class Delete extends Component
{
    use NotificationTrait;

    public int $userId; 

    public function success($msg)
    {
        $this->alert(
            [
                'icon' => 'success',
                'title' => $msg,
            ]
        );
        $this->dispatch('re-render::admin::userslist::view');
        $this->dispatch('close-modal');
    }


    public function fail($msg)
    {
        $this->alert([
            'icon' => "error",
            'title' => __('Erro'),
            'text' => $msg
        ]);
    }

    /**
     * all events ended in '::confirmed' initiate its lifecycle
     * on a confirm_{methodName} that trigger a confirmation
     * dialog modal to the user
     */
    #[On('admin::delete::user::confirmed')]
    public function delete($userId)
    {   
        $this->userId = $userId;
        try {
            DB::transaction(function () {
                $user = User::findOrFail($this->userId);
                $user->delete();
            });
            $this->success(msg: 'Usuario Deletado!');
        } catch (ValidationException $e) {
            throw $e;
        } catch (UserHasInteractionsException $e) {
            report($e);
            $this->fail(msg: $e->getMessage());
        } catch (\Exception $e) {
            report($e);
            $this->fail(msg: __('Falha ao deletar usuario'));
        }
    }
    
    public function render()
    {
        return view('livewire.user.admin.delete');
    }
}
