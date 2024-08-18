<?php

namespace App\Livewire\Song;

use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Playlist;
use Livewire\Component;
use App\Models\Song;


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
        $userId = Auth::user()->id;
        $search = $this->search;
        $paginateLimit = 10;

        if ($this->idValue && $this->idColumn) {
            $searchedSongs = $this->idColumn === 'playlist_id'
                ? Playlist::where('user_id', $userId)
                ->where('id', $this->idValue)
                ->first()
                ->songs()
                ->search($search)
                ->paginate($paginateLimit)
                : Song::where($this->idColumn, $this->idValue)
                ->search($search)
                ->paginate($paginateLimit);
        } else {
            $searchedSongs = Song::search($search)->paginate($paginateLimit);
        }

        return view('livewire.song.search', [
            'searchedSongs' => $searchedSongs,
        ]);
    }
}
