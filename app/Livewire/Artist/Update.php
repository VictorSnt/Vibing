<?php

namespace App\Livewire\Artist;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use App\Traits\NotificationTrait;
use App\Traits\ValidationTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Artist;


/**
 * This component is designed to be used as a modal
 * It may won't work on other contexts
 */
class Update extends Component
{
    use NotificationTrait, WithFileUploads, ValidationTrait;

    protected function rules(): array
    {
        return [
            'name' => 'nullable|max:25',
            'image' => 'nullable|file|mimes:png,jpg',

        ];
    }

    public int $artistId;
    public string $name = '';
    public ?string $currentImagePath;
    public $image = null;


    /**
     * Mounts up the modal data with the clicked Artist Info
     * event(open-modal) with the $artistId is trigged
     * by the user click 
     */
    #[On('open-modal')]
    public function setFields($artistId = null)
    {
        if ($artistId) {
            $artist = Artist::findOrFail($artistId);
            $this->artistId = $artistId;
            $this->name = $artist->name;
            $this->currentImagePath = $artist->image;
        }
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

    public function success($msg)
    {
        $this->clearForm();
        $this->alert([
            'icon' => 'success',
            'title' => $msg,
        ]);
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

    public function confirm_removeImage()
    {
        $this->dialog([
            'icon' => "warning",
            'title' => __('local.atention'),
            'text' => __('Tem certeza?')
        ], returnEventName: 'remove::artist::img::confirmed');
    }

    /**
     * all events ended in '::confirmed' initiate its lifecycle
     * on a confirm_{methodName} that trigger a confirmation
     * dialog modal to the user
     */
    #[On('remove::artist::img::confirmed')]
    public function removeImage()
    {
        try {
            DB::transaction(function () {
                $artist = Artist::findOrFail($this->artistId);
                $artist->update(['image' => null]);
            }, attempts: 2);

            $this->success(msg: __('Imagem Removida'));
        } catch (\Exception $e) {
            report($e);
            $this->fail(msg: __('local.excludeerror'));
        }
    }


    public function update(): void
    {
        try {
            $fields = $this->pullFields();
            DB::transaction(function () use ($fields) {
                $artist = Artist::findOrFail($this->artistId);
                $artist->update($fields);
            }, attempts: 1);

            $this->success(msg: __('local.Updated'));
        } catch (ValidationException $e) {
            report($e);
            $this->fail(msg: $e->getMessage());
        } catch (\Exception $e) {
            report($e);

            $this->fail(msg: __('local.UpdateFailed'));
        }
    }

    public function render()
    {
        return view('livewire.artist.update');
    }
}
