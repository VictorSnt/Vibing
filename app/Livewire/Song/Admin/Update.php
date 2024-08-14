<?php

namespace App\Livewire\Song\Admin;


use Illuminate\Validation\ValidationException;
use App\Traits\HandlesUniqueConstraint;
use Illuminate\Support\Facades\DB;
use App\Traits\NotificationTrait;
use App\Traits\ValidationTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Song;
use Exception;


class Update extends Component
{
    use NotificationTrait, ValidationTrait;
    use HandlesUniqueConstraint;

    public $song;
    public $title;
    public $duration;

    protected function rules(): array
    {
        return [
            'title' => 'nullable|max:25|unique:songs',
            'duration' => 'nullable|integer',
        ];
    }

    #[On('open-modal')]
    public function setFields($songId = null)
    {
        if ($songId) {
            try {
                $this->song = Song::findOrFail($songId);
                $this->title = $this->song->title;
                $this->duration = $this->song->duration;

            } catch (Exception $e) {
                report($e);
                $this->alert([
                    'icon' => "error",
                    'title' => __('Erro'),
                    'text' => 'Algo errado ao acessar musica'
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

    public function update()
    {
        try {
            $fields = $this->getValidData(asObj: false);
            DB::transaction(function () use ($fields) {
                $this->song->update($fields);
            });

            $this->success(msg: __('Musica Atualizada'));
        } catch (ValidationException $e) {
            report($e);
            $this->fail(msg: $e->getMessage());
        } catch (Exception $e) {
            report($e);
            $this->fail(msg: 'Falha ao atualizar musica');
        }
    }

    
    public function render()
    {
        return view('livewire.song.admin.update');
    }
}
