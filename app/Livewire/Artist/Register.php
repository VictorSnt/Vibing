<?php

namespace App\Livewire\Artist;

use Illuminate\Support\Facades\DB;
use App\Traits\NotificationTrait;
use App\Traits\ValidationTrait;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Artist;
use Illuminate\Validation\ValidationException;

class Register extends Component
{
    use NotificationTrait, WithFileUploads, ValidationTrait;

    public string $name = '';
    public $image;

    protected function rules(): array
    {
        return [
            'name' => 'required|max:25',
            'image' => 'nullable',
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

    public function pullFields()
    {
        $fields = $this->getValidData(asObj: false);
        if (isset($fields['image']) && $fields['image']) {
            $path = $fields['image']->store('images', 'public');
            $fields['image'] = $path;
        }
        return $fields;
    }

    public function store(): void
    {
        try {
            $fields = $this->pullFields();
            DB::transaction(function () use ($fields) {
                Artist::create($fields);
            }, attempts: 2);

            $this->success(msg: 'Artista registrado');
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
        return view('livewire.artist.register');
    }
}
