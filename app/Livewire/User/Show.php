<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::paginate(1);
        return view('livewire.user.show', ['users' => $users]);
    }
}
