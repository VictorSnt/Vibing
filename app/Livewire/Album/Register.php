<?php

namespace App\Livewire\Album;

use App\Exceptions\RowAlreadyExistsException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use App\Traits\NotificationTrait;
use App\Traits\ValidationTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Artist;
use App\Models\Album;
use App\Traits\HandlesUniqueConstraint;
use Exception;


class Register extends Component
{
    use NotificationTrait, ValidationTrait;
    use HandlesUniqueConstraint;

    public $artist_id;
    public $artist;
    public $name;
    public $search;

    protected function rules(): array
    {
        return [
            'name' => 'required|max:25',
            'artist_id' => 'required|exists:artists,id|integer',
        ];
    }

    #[On('open-modal')]
    public function setFields($createAlbumArtistId = null)
    {
        if ($createAlbumArtistId) {
            try {
                $this->artist = Artist::findOrFail($createAlbumArtistId);
                $this->artist_id = $createAlbumArtistId;
            } catch (Exception $e) {
                report($e);
                $this->alert([
                    'icon' => "error",
                    'title' => __('Erro'),
                    'text' => 'Algo errado ao selecionar o Artista'
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

    public function store()
    {
        try {
            $fields = $this->getValidData(asObj: false);
            DB::transaction(function () use ($fields) {
                $this->createOrRestore($fields, new Album);
            });

            $this->success(msg: __('Album criado'));
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
        return view('livewire.album.register');
    }
}
