<?php

namespace App\Livewire\Playlist;

use App\Models\Playlist;
use App\Models\Song;
use App\Traits\NotificationTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class AddSong extends Component
{
    use NotificationTrait;

    public $search;
    public $songId;
    public $playlistcount;


    public function mount()
    {
        $this->playlistcount = Playlist::where('user_id', Auth::user()->id)->count();
    }



    #[On('open-modal')]
    public function setSongId($playlistAddSongId = null)
    {
        if ($playlistAddSongId)
            $this->songId = $playlistAddSongId;
    }

    public function success($msg)
    {
        $this->alert(
            [
                'icon' => 'success',
                'title' => $msg,
            ]
        );
        $this->dispatch('re-render::playlist::view');
        $this->dispatch('close-modal');
    }

    public function fail($msg)
    {
        $this->alert([
            'icon' => "error",
            'title' => __('Erro'),
            'text' => $msg
        ]);
    }

    public function pushToPlaylist($playlistId)
    {
        if (!$this->songId) return;
        $playlist = Playlist::where('user_id', Auth::user()->id)
            ->where('id', $playlistId)
            ->first();
        if (!$playlist->songs()->find($this->songId)) {
            $playlist->songs()->attach($this->songId);
            $this->success(msg: 'Adicionada com Sucesso');
            return;
        }
        $this->fail(msg: 'Essa musica ja esta na sua playlist');
    }

    public function render()
    {
        return view('livewire.playlist.add-song', [
            'playlists' => Playlist::where('user_id', Auth::user()->id)
                ->search($this->search)
                ->paginate(2)
        ]);
    }
}
