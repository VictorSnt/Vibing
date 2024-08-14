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
    public $artistId;

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
        $query = Album::query();

        if (isset($this->artistId) && $this->artistId) {
            $query->where('artist_id', $this->artistId);
        }

        if ($this->search) {
            $this->setPage(1);
            $query->search($this->search);
        }

        return $query->orderByRaw('GREATEST(updated_at, created_at) DESC')->paginate(3);
    }

    public function render()
    {
        $albums = $this->getAlbum();
        return view('livewire.album.show', ['albums' => $albums]);
    }
}
