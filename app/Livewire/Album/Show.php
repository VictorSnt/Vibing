<?php

namespace App\Livewire\Album;

use App\Models\Album;
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
    #[On('re-render::album::view')]
    public function resetPage()
    {
        redirect()->route('album-index');
    }

    public function getAlbum()
    {
        if ($this->search) {
            $this->setPage(1);
            return Album::search($this->search)->paginate(3);
        } else {
            return Album::orderByRaw('GREATEST(updated_at, created_at) DESC')->paginate(3);
        }
    }
    
    public function render()
    {
        $albums = $this->getAlbum();
        return view('livewire.album.show', ['albums' => $albums]);
    }
}
