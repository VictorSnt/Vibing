<?php

namespace App\Livewire\Song\Admin;

use App\Exceptions\RowAlreadyExistsException;
use Illuminate\Validation\ValidationException;
use App\Traits\HandlesUniqueConstraint;
use Illuminate\Support\Facades\DB;
use App\Traits\NotificationTrait;
use App\Traits\ValidationTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Album;
use App\Models\Song;
use Exception;


class Register extends Component
{
    use NotificationTrait, ValidationTrait;
    use HandlesUniqueConstraint;

    public $artist_id;
    public $album_id;
    public $title;
    public $duration;
    public $artist = null;
    public $search;


    protected function rules(): array
    {
        return [
            'title' => 'required|max:25',
            'artist_id' => 'required|exists:artists,id|integer',
            'album_id' => 'required|exists:albums,id|integer',
            'duration' => 'required|integer',
        ];
    }

    #[On('open-modal')]
    public function setFields($albumId = null)
    {
        if ($albumId) {
            try {
                $album = Album::findOrFail($albumId);
                $this->album_id = $album->id;
                $this->artist_id = $album->artist->id;
                $this->artist = $album->artist;
            } catch (Exception $e) {
                report($e);
                $this->alert([
                    'icon' => "error",
                    'title' => __('Erro'),
                    'text' => 'Algo errado ao vincilar o Album'
                ]);
            }
        }
    }


    public function success($msg)
    {
        $this->clearForm();
        $this->alert([
            'icon' => 'success',
            'title' => $msg,
        ]);
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

    public function store()
    {
        try {
            $fields = $this->getValidData(asObj: false);
            DB::transaction(function () use ($fields) {
                $this->createOrRestore($fields, new Song);
            });

            $this->success(msg: __('Musica Criada'));
        } catch (ValidationException $e) {
            report($e);
            $this->fail(msg: $e->getMessage());
        } catch (RowAlreadyExistsException $e) {
            report($e);
            $this->fail(msg: $e->getMessage());
        } catch (Exception $e) {
            report($e);
            $this->fail(msg: 'Falha ao criar Album');
        }
    }

    public function render()
    {
        return view('livewire.song.admin.register');
    }
}
