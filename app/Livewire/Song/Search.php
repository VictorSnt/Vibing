<?php

namespace App\Livewire\Song;

use App\Models\Song;
use Livewire\Component;

class Search extends Component
{
    public $search = '';
    public $title = '';
    public $songs = null;

    public function render()
    {
      
        $searchedSongs = $this->search === '' ? [] : Song::search($this->search)->get();

        return view('livewire.song.search', [
            'searchedSongs' => $searchedSongs === [] && $this->songs ? $this->songs : $searchedSongs,
        ]);
    }
}
