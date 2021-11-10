<?php

namespace Invoque\Hermes\Http\Livewire\Security;

use Livewire\Component;

class UsersComponent extends Component
{
    public $itens;

    public function render()
    {
        return view('Hermes::security.users.index');
    }
}
