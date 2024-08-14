<?php

namespace App\Livewire\Song;

use App\Models\Album;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Song;

class Show extends Component
{

    use WithPagination;

    public $search;
    public $albumId;
    public $album;

    public function mount($albumId = null)
    {
        if($albumId) {
            $this->album = Album::findOrFail($albumId);
            $this->albumId = $albumId;
        }
    }


    /**
     * Reload Page to avoid pagination error
     */
    #[On('re-render::song::view')]
    public function resetPage()
    {
        redirect()->route('song-index');
    }

    public function getSong()
    {
        $query = Song::query();

        if (isset($this->albumId) && $this->albumId) {
            $query->where('album_id', $this->albumId);
        }
        
        if ($this->search) {
            $this->setPage(1);
            $query->search($this->search);
        }
        
        return $query->orderByRaw('GREATEST(updated_at, created_at) DESC')->paginate(3);
        
    }

    public function render()
    {
        $songs = $this->getSong();
        return view('livewire.song.show', ['songs' => $songs]);
    }
}
