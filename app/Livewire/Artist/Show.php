<?php

namespace App\Livewire\Artist;

use App\Models\Artist;
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
    #[On('re-render::artists::view')]
    public function reRenderPage()
    {
        redirect()->route('artist-index');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
    
    public function getArtists()
    {
        if ($this->search) {
            return Artist::search($this->search)->paginate(3);
        } else {
            
            return Artist::orderByRaw('GREATEST(updated_at, created_at) DESC')
            ->paginate(3);
        }
    }

    public function render()
    {

        $artists = $this->getArtists();
        return view('livewire.artist.show', ['artists' => $artists]);
    }
}
