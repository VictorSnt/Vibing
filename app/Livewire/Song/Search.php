<?php

namespace App\Livewire\Song;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public $title = '';
    public $search = '';
    public $idValue = null;
    public $idColumn = null;
    

    #[On('re-render::playlist::view')]
    public function render()
    {
        if ($this->idValue && $this->idColumn) {
            if ($this->idColumn === 'playlist_id') {
                $playlist = Playlist::where('user_id', Auth::user()->id)
                    ->where('id', $this->idValue)
                    ->first();
                    
                $searchedSongs = $playlist->songs()
                    ->search($this->search)
                    ->paginate(10);
            } else {
                $searchedSongs = Song::where($this->idColumn, $this->idValue)
                    ->search($this->search)
                    ->paginate(10);
            }
        } else {
            $searchedSongs = Song::search($this->search)->paginate(10);
        }
        
        return view('livewire.song.search', [
            'searchedSongs' => $searchedSongs,
        ]);
    }
}
