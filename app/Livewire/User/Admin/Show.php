<?php

namespace App\Livewire\User\Admin;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $search;

    /**
     * Reload Page to avoid pagination error
     */
    #[On('re-render::admin::userslist::view')]
    public function resetPage()
    {
        redirect()->route('listusers-index');
    }

    public function getUsers()
    {
        if ($this->search) {
            $this->setPage(1);
            return User::search($this->search)->paginate(3);
        } else {
            return User::orderByRaw('GREATEST(updated_at, created_at) DESC')->paginate(3);
        }
    }

    public function render()
    {
        $users = $this->getUsers();
        return view('livewire.user.admin.show', ['users' => $users]);
    }
}

