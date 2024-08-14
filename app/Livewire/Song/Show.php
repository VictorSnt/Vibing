<?php

namespace App\Livewire\Song;

use App\Models\Like;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Song;
use App\Traits\NotificationTrait;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    use NotificationTrait;

    public $search;

    public function getSongs()
    {
        $query = Song::query();
        if ($this->search) {
            $query->search($this->search);
        }
        
        return $query->paginate(6);
    }


    #[On('song::liked')]
    public function liked($songId)
    {
        $data = [
            'song_id' => $songId,
            'user_id' => Auth::user()->id
        ];

        $like = Like::where('song_id', $songId)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($like) {
            $like->forceDelete();
            $this->dispatch('re-render::song::view');
            return;
        }


        Like::create($data);
        $this->dispatch('re-render::song::view');
    }


    #[On('re-render::song::view')]
    public function render()
    {
        $songs = $this->getSongs();
        return view('livewire.song.show', ['songs' => $songs]);
    }
}
