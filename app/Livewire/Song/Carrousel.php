<?php

namespace App\Livewire\Song;

use App\Models\Like;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;
use App\Traits\NotificationTrait;
use Livewire\Attributes\On;
use Livewire\Component;


class Carrousel extends Component
{
    use NotificationTrait;

    public $songs;
    public $title;

    public function mount($title)
    {
       
        $this->title = $title;
        $this->songs = Song::inRandomOrder()
            ->limit(10)
            ->get();
    }

    #[On('re-render::song::carrousel')]
    public function render()
    {
        return view('livewire.song.carrousel', ['songs' => $this->songs]);
    }
}
