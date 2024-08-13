<?php

namespace App\Livewire\Song;

use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Song;

class Show extends Component
{

    use WithPagination;

    public $search;

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
        if ($this->search) {
            $this->setPage(1);
            return Song::search($this->search)->paginate(3);
        } else {
            return Song::orderByRaw('GREATEST(updated_at, created_at) DESC')->paginate(3);
        }
    }

    public function render()
    {
        $songs = $this->getSong();
        return view('livewire.song.show', ['songs' => $songs]);
    }
}
