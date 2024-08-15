<?php

namespace App\Livewire\Song;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use App\Traits\NotificationTrait;
use Livewire\Attributes\On;
use Livewire\Component;


class Carrousel extends Component
{
    use NotificationTrait;

    public $songs;
    public $title;

    public function mount($title, $songs)
    {
        $this->songs = $songs;
        $this->title = $title;
    }

    #[On('song::liked')]
    public function liked($songId)
    {
        $userId = Auth::user()->id;

        $like = Like::where('song_id', $songId)
            ->where('user_id', $userId)
            ->first();

        if ($like) {
      
            $like->delete();
        } else {

            Like::create([
                'song_id' => $songId,
                'user_id' => $userId
            ]);
        }

        $this->dispatch('re-render::song::carrousel');
    }

    #[On('re-render::song::carrousel')]
    public function render()
    {
        return view('livewire.song.carrousel', ['songs' => $this->songs]);
    }
}
