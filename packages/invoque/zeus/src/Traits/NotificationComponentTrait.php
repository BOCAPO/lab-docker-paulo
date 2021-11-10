<?php

namespace Invoque\Zeus\Traits;

trait NotificationComponentTrait
{
    public function swalNotification($mensage, $icon, $position = 'top-end')
    {
        return $this->emit('swal:alert', [
            'position' => $position,
            'icon' => $icon,
            'title' => $mensage,
            'showConfirmButton' => false,
            'timer' => 1500
        ]);
    }

    public function swalNotificationAlert($mensage, $icon)
    {
        return $this->emit('swal:alert', [
            'title' => $mensage,
            'icon' => $icon
        ]);
    }

    public function swalNotificationModal($mensage, $icon)
    {
        return $this->emit('swal:modal', [
            'title' => $mensage,
            'icon' => $icon
        ]);
    }

    public function swalNotificationConfirm($title, $mensage, $icon, $confirmText)
    {
        return $this->emit('swal:confirm', [
            'title' => $title,
            'mensage' => $mensage,
            'icon' => $icon,
            'confirmText' => $confirmText
        ]);
    }

    public function toastNotification($mensage)
    {
        return $this->emit('toast:notify', ['title' => $mensage]);
    }
}
