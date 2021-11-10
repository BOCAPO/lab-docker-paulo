<?php

namespace Invoque\Zeus\Traits;

trait BehaviorComponentTrait
{
    public $isOpen = 0;
    public $isOpenDetails = false;

    public function openForm()
    {
        $this->isOpen = true;
        $this->dispatchBrowserEvent('openForm');
    }

    public function closeForm()
    {
        $this->dispatchBrowserEvent('closeForm');
        $this->clearInputs();
        $this->isOpen = false;
    }

    public function openDetails()
    {
        $this->isOpenDetails = true;
        $this->dispatchBrowserEvent('openDetails');
    }

    public function closeDetails()
    {
        $this->dispatchBrowserEvent('closeDetails');
        $this->isOpenDetails = false;
    }

    public function clearInputs()
    {
        foreach ($this->model->getFillable() as $var) {
            $this->form[$var] = null;
        }
    }
}
