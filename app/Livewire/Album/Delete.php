<?php

namespace App\Livewire\Album;

use App\Exceptions\AlbumHasSongsException;
use App\Traits\NotificationTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Album;

class Delete extends Component
{
    use NotificationTrait;

    public function success($msg)
    {
        $this->alert(
            [
                'icon' => 'success',
                'title' => $msg,
            ]
        );
        $this->dispatch('re-render::album::view');
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
    #[On('delete::album::confirmed')]
    public function delete($albumId)
    {
        try {
            DB::transaction(function () use ($albumId) {
                $album = Album::findOrFail($albumId);
                $album->delete();
            });
            $this->success(msg: 'Album Deletado!');
        } catch (AlbumHasSongsException $e) {
            report($e);
            $this->fail(msg: $e->getMessage());
        } catch (\Exception $e) {
            report($e);
            dd($e);
            $this->fail(msg: __('Falha ao deletar Album'));
        }
    }


    public function render()
    {
        return view('livewire.album.delete');
    }
}
