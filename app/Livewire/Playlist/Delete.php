<?php

namespace App\Livewire\Playlist;

use App\Models\Playlist;
use App\Traits\NotificationTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    use NotificationTrait;


    public function success($msg)
    {
        $this->alert([
            'icon' => 'success',
            'title' => $msg,
        ]);
        $this->dispatch('re-render::playlist::view');
    }

    public function confirm_delete()
    {
        $this->dialog([
            'icon' => "warning",
            'title' => __('local.atention'),
            'text' => __('Deletar Playlist')
        ], returnEventName: 'delete::playlist::confirmed');
    }

    /**
     * all events ended in '::confirmed' initiate its lifecycle
     * on a confirm_{methodName} that trigger a confirmation
     * dialog modal to the user
     */
    #[On('delete::playlist::confirmed')]
    public function delete($playlistId)
    {
        try {
            DB::transaction(function () use ($playlistId) {
                $playlist = Playlist::findOrFail($playlistId);
                $playlist->delete();
            });
            $this->success(msg: 'Playlist Deletada!');
        } catch (\Exception $e) {
            report($e);
            $this->alert([
                'icon' => "error",
                'title' => __('local.Error'),
                'text' => __('local.RegistrationFailed')
            ]);
        }
    }


    public function render()
    {
        return view('livewire.playlist.delete');
    }
}
