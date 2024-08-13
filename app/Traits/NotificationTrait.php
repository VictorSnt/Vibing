<?php

namespace App\Traits;


trait NotificationTrait
{
    /**
     * Send a alert event with sweetalert props to frontend.
     *
     * @param array $attrs
     * @return void
     */
    public function alert(array $attrs)
    {
        $data = [
            'icon' => $attrs['icon'] ?? 'info',
            'title' => $attrs['title'] ?? 'Atenção!',
            'text' => $attrs['text'] ?? '',
            'position' => $attrs['position'] ?? 'center'
        ];
        $this->dispatch('alert::show', $data);
    }

    /**
     * Send a dialog confimation event with sweetalert props to frontend.
     *
     * @param array $attrs
     * @param string $eventName
     * @return void
     */
    public function dialog(array $attrs, string $returnEventName)
    {
        $data = [
            'icon' => $attrs['icon'] ?? 'info',
            'title' => $attrs['title'] ?? 'Atenção!',
            'text' => $attrs['text'] ?? '',
            'position' => $attrs['position'] ?? 'center',
            'showCancelButton' => true,
            'confirmButtonColor' => "#3085d6",
            'cancelButtonColor' => "#d33",
            'confirmButtonText' => "Confirmar",
            'returnEventName' => $returnEventName
        ];
        $this->dispatch('dialog::show', $data);
    }


    /**
     * Send a toast event with sweetalert props to frontend, can be flashed to the next page.
     *
     * @param array $attrs
     * @param bool $nextPage
     * @return void
     */
    public function notify(array $attrs, $nextPage = false)
    {
        $data = (object)[
            'icon' => $attrs['icon'] ?? 'info',
            'title' => $attrs['title'] ?? 'Atenção!',
            'text' => $attrs['text'] ?? '',
        ];

        if ($nextPage) {
            session()->flash('notification.event', $data);
        } else {
            $this->dispatch('notify::show', $data);
        }
    }
}