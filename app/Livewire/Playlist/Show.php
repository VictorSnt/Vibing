<?php

namespace App\Livewire\Playlist;

use App\Models\Playlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public $search = ''; 


    #[On('re-render::playlist::view')]
    public function render()
    {

        return view('livewire.playlist.show', [
            'playlists' => Playlist::where('user_id', Auth::user()->id)
                ->search($this->search)
                ->paginate(10)
        ]);
    }
}
