<?php

namespace App\Livewire\Album;

use Livewire\Component;
use Illuminate\Validation\ValidationException;
use App\Traits\NotificationTrait;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use App\Models\Album;
use App\Traits\ValidationTrait;
use Exception;


class Update extends Component
{

    use NotificationTrait, ValidationTrait;

    public $album;
    public $name;
    
    protected function rules(): array
    {
        return [
            'name' => 'required|max:25|unique:albums',
        ];
    }

    #[On('open-modal')]
    public function setFields($albumId = null)
    {
        if ($albumId) {
            try {
                $this->album = Album::findOrFail($albumId);
                $this->name = $this->album->name;
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

    public function update()
    {
        try {
            $fields = $this->getValidData(asObj: false);
            DB::transaction(function () use ($fields) {
                $this->album->update($fields);
            });
            $this->success(msg: __('Album Atualizado'));
        } catch (ValidationException $e) {
            report($e);
            $this->fail(msg: $e->getMessage());
        } catch (Exception $e) {
            report($e);
            dd($e);
            $this->fail(msg: 'Falha ao Atualizar Album');
        }
    }


    public function render()
    {
        return view('livewire.album.update');
    }
}
