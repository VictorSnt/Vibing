<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use App\Traits\NotificationTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Component;


class Delete extends Component
{
    use NotificationTrait;

    public function confirm_delete()
    {
        $this->dialog([
            'icon' => "warning",
            'title' => __('local.atention'),
            'text' => __('local.delete-acc-warning')
        ], returnEventName: 'delete::user::confirmed');
    }

    /**
     * all events ended in '::confirmed' initiate its lifecycle
     * on a confirm_{methodName} that trigger a confirmation
     * dialog modal to the user
     */
    #[On('delete::user::confirmed')]
    public function delete()
    {
        try {
            DB::transaction(function () {
                /** @var User|null $user */
                $user = Auth::user();
                $user->delete();
            });
            redirect()->route('logout');
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            report($e);
            $this->alert([
                'icon' => "error",
                'title' => __('local.Error'),
                'text' => __('local.RegistrationFailed')
            ]);
        }
    }

    public function render()
    {
        return view('livewire.user.delete');
    }
}
