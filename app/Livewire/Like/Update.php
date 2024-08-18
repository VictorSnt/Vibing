<?php

namespace App\Livewire\Like;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
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
        $this->dispatch('like::completed');

    }

    public function render()
    {
        return view('livewire.like.update');
    }
}
