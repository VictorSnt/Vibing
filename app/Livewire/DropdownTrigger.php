<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class DropdownTrigger extends Component
{
    #[On('user::updated')]
    public function render()
    {
        return view('livewire.dropdown-trigger');
    }
}