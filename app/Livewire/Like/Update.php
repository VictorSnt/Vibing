<?php

namespace App\Livewire\Like;

use App\Models\Song;
use App\Traits\NotificationTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
    use NotificationTrait;

    #[On('song::liked')]
    public function liked($songId)
    {
        if (Song::find($songId)) {
            /** @var User $user */
            $user = Auth::user();
            DB::transaction(function () use ($user, $songId) {
                $user->likedSongs()->toggle($songId);
            });
            return;
        }

        $this->alert([
            'icon' => 'error',
            'title' => 'Erro ao registrar like'
        ]);
    }

    public function render()
    {
        return view('livewire.like.update');
    }
}
