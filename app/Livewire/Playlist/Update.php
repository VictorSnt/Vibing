<?php

namespace App\Livewire\Playlist;

use App\Models\Playlist;
use App\Traits\NotificationTrait;
use App\Traits\ValidationTrait;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
    use NotificationTrait, ValidationTrait;

    public $playlist;
    public $name;

    protected function rules(): array
    {
        return [
            'name' => 'required|max:25|unique:albums',
        ];
    }


    public function success($msg)
    {
        $this->clearForm();
        $this->alert([
            'icon' => 'success',
            'title' => $msg,
        ]);
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

    
    #[On('open-modal')]
    public function setFields($updatePlaylistId = null)
    {
        if ($updatePlaylistId) {
            try {
                $playlist = Playlist::findOrFail($updatePlaylistId);
                if ($playlist->user_id === Auth::user()->id) {
                    $this->playlist = $playlist;
                    $this->name = $this->playlist->name;
                } else {
                    $this->fail(msg: 'Inacessivel');
                }
                
            } catch (Exception $e) {
                report($e);
                $this->alert([
                    'icon' => "error",
                    'title' => __('Erro'),
                    'text' => 'Algo errado ao Atualizar'
                ]);
            }
        }
    }

    

    public function update()
    {
        try {
            $fields = $this->getValidData(asObj: false);
            DB::transaction(function () use ($fields) {
                $this->playlist->update($fields);
            });
            $this->success(msg: __('Playlist Atualizada'));
        } catch (ValidationException $e) {
            report($e);
            $this->fail(msg: $e->getMessage());
        } catch (Exception $e) {
            report($e);
            dd($e);
            $this->fail(msg: 'Falha ao Atualizar Playlist');
        }
    }


    public function render()
    {
        return view('livewire.playlist.update');
    }
}
