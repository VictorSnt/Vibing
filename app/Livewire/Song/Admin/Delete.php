<?php

namespace App\Livewire\Song\Admin;


use App\Traits\NotificationTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Song;

class Delete extends Component
{
    use NotificationTrait;

    public int $albumId; 

    public function success($msg)
    {
        $this->alert(
            [
                'icon' => 'success',
                'title' => $msg,
            ]
        );
        $this->dispatch('re-render::admin::song::view');
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

    /**
     * all events ended in '::confirmed' initiate its lifecycle
     * on a confirm_{methodName} that trigger a confirmation
     * dialog modal to the user
     */
    #[On('delete::song::confirmed')]
    public function delete($songId)
    {   
        try {
            DB::transaction(function () use ($songId) {
                $song = Song::findOrFail($songId);
                $song->delete();
            });
            $this->success(msg: 'Musica Deletada!');
        } catch (\Exception $e) {
            report($e);
            $this->fail(msg: __('Falha ao deletar Musica'));
        }
    }

    
    public function render()
    {
        return view('livewire.song.admin.delete');
    }
}
