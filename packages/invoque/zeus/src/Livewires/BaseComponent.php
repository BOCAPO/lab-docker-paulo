<?php

namespace Invoque\Zeus\Livewires;

use Invoque\Zeus\Traits\BehaviorComponentTrait;
use Invoque\Zeus\Traits\NotificationComponentTrait;
use Livewire\Component;

class BaseComponent extends Component implements BaseComponentInterface
{
    public $search = [];
    public $form;

    protected $data, $model, $rulesValidator;

    protected $listeners = [
        'openCreate' => 'create',
        'openEdit' => 'edit',
        'openDetails' => 'details',
        'openView' => 'view',
        'delete' => 'delete'
    ];

    use BehaviorComponentTrait;
    use NotificationComponentTrait;

    public function render(){}

    public function mount(){
        $this->form[$this->model->getPrimaryKey()] = null;

        //PREPARO O OBJETO PARA SALVAR
        foreach ($this->model->getFillable() as $var) {
            $this->form[$var] = null;
        }
    }

    public function create()
    {
        $this->{$this->model->getPrimaryKey()} = null;
        $this->openForm();
    }

    public function store()
    {
        $this->validate($this->getValidateRules());

        $dataForm = $this->form;

        try{
            //PEGO O ID
            $id = $this->form[$this->model->getPrimaryKey()];

            //CASO O ID SEJA ENVIADO ELE ALTERA
            if(!is_null($id)) {
                $register = $this->model->find($id);

                if($register->count()) {
                    $register->update($dataForm);
                }
            }

            //CASO O ID SEJA NULO ELE CRIA
            if(is_null($id)) {
                $this->model->create($dataForm);
            }

            $this->emit('dataReload');
            $this->closeForm();
            return $this->swalNotification('Registro salvo com sucesso', 'success');

        }catch (\Exception $e) {
            if(env('APP_DEBUG'))
            {
                dd($e->getMessage());
            }

            return $this->swalNotification($e->getMessage(), 'error');
        }
    }

    public function edit($id)
    {
        $data = $this->model->find($id);

        //ADICIONO A PRIMARY KEY NA VARIAVEL PUBLIC
        $this->form[$this->model->getPrimaryKey()] = $id;

        foreach ($this->model->getFillable() as $var) {
            $this->form[$var] = $data->{$var};
        }

        $this->openForm();
    }

    public function details($id)
    {
        $data = $this->model->find($id);

        //ADICIONO A PRIMARY KEY NA VARIAVEL PUBLIC
        $this->form[$this->model->getPrimaryKey()] = $id;

        foreach ($this->model->getFillable() as $var) {
            $this->form[$var] = $data->{$var};
        }

        $this->openDetails();
    }

    public function delete($id)
    {
        try {
            $this->model->find($id)->delete();
            $this->emit('dataReload');

            return $this->swalNotification('Registro removido com sucesso', 'success');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}
