<?php

namespace App\Livewire\Artist;

use App\Exceptions\ArtistHasAlbumsException;
use App\Exceptions\ArtistHasSongsException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use App\Traits\NotificationTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Artist;


class Delete extends Component
{
    use NotificationTrait;

    public int $artistId; 

    public function success($msg)
    {
        $this->alert(
            [
                'icon' => 'success',
                'title' => $msg,
            ]
        );
        $this->dispatch('re-render::artists::view');
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
    #[On('delete::artist::confirmed')]
    public function delete($artistId)
    {   
        try {
            $artist = Artist::findOrFail($artistId);
            DB::transaction(function () use ($artist) {
                $artist->delete();
            });
            $this->success(msg: 'Artista Deletado!');
        } catch (ArtistHasAlbumsException $e) {
            report($e);
            $this->fail(msg: $e->getMessage());
        } catch (\Exception $e) {
            report($e);
            $this->fail(msg: __('Falha ao deletar artista'));
        }
    }
}
