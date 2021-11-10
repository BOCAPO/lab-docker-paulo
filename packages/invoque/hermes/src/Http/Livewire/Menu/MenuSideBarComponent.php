<?php

namespace Invoque\Hermes\Http\Livewire\Menu;

use Livewire\Component;

class MenuSideBarComponent extends Component
{
    public $itens;

    public function render()
    {
        return view('Hermes::menu.sidebar', $this->itens);
    }
}
