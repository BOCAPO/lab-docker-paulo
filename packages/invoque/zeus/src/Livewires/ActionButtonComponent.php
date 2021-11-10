<?php

namespace Invoque\Zeus\Livewires;

use Livewire\Component;

class ActionButtonComponent extends Component
{
    public $data;
    public $style = 'button';
    public $param = [];

    public function render()
    {
        return view('zeus::actionButton', [
                'data' => $this->data,
                'style' => $this->style,
                'param' => $this->param,
            ]
        );
    }
}
