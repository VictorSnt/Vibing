<?php

namespace App\Livewire\Playlist;

use App\Models\Playlist;
use App\Traits\NotificationTrait;
use App\Traits\ValidationTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Register extends Component
{
    use NotificationTrait, ValidationTrait;

    public $name;

    protected function rules(): array
    {
        return [
            'name' => 'required|max:15',
        ];
    }

    public function success($msg)
    {
        $this->clearForm();
        $this->alert(
            [
                'icon' => 'success',
                'title' => $msg,
            ]
        );
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

    public function store()
    {
        try {
            $fields = $this->getValidData(asObj: false);
            $fields['user_id'] = Auth::user()->id;
            DB::transaction(function () use ($fields) {
                Playlist::create($fields);
            }, attempts: 2);

            $this->success(msg: 'Playlist Criada');
        } catch (ValidationException $e) {
            report($e);
            $this->fail(msg: $e->getMessage());
        } catch (\Exception $e) {
            report($e);
            $this->fail(msg: __('local.RegistrationFailed'));
        }
    }

    public function render()
    {
        return view('livewire.playlist.register');
    }
}
