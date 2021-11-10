<?php

namespace App\Http\Livewire;

use App\Models\Teste;
use Livewire\Component;

class TesteComponent extends Component
{
    protected $listeners = ['openModal', 'closeModal', 'store'];

    private $model;
    public $data;
    public $name;

    public $isOpen = false;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->model = [];
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function store()
    {
        dd('bruno');
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        $this->data =[];
        return view('livewire.teste-component');
    }

    public function save()
    {
        dd('bruno araujo asdasd');
    }
}
