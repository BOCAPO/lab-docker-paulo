<?php

namespace Invoque\Hermes\Http\Livewire\Security\Profiles;

use Illuminate\Support\Facades\Session;
use Invoque\Hermes\Models\Profiles;
use Invoque\Zeus\Livewires\BaseComponent;

class ProfilesComponent extends BaseComponent
{
    public $itens;
    public $search = [];
    public $menu = [];
    public $permissionsCheck = [];

    public function mount()
    {
        parent::mount();
    }

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->model = new Profiles();

        $this->menu = config('menu');
    }

    public function render()
    {
        return view('Hermes::security.profiles.index');
    }

    public function store()
    {
        $this->validate($this->getValidateRules());

        $dataForm = $this->form;
        $dataForm['prf_permission'] = $this->formatPermission('save', $this->permissionsCheck);

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
            return $this->swalNotification($e->getMessage(), 'error');
        }
    }

    public function edit($id)
    {
        $data = $this->model->find($id);

        //ADICIONO A PRIMARY KEY NA VARIAVEL PUBLIC
        $this->form[$this->model->getPrimaryKey()] = $id;

        //Formato para exibir os check selecionados
        $this->permissionsCheck = $this->formatPermission('view', $data->prf_permission);

        foreach ($this->model->getFillable() as $var) {
            $this->form[$var] = $data->{$var};
        }

        $this->openForm();
    }

    public function clearInputs()
    {
        parent::clearInputs();
        $this->permissionsCheck = [];
    }

    private function formatPermission($type, $check)
    {
        $result = [];

        foreach($check as $permission){
            if($permission == ''){
                continue;
            }

            if($type == 'save'){
                $value = str_replace('_','.', $permission);
            }

            if($type == 'view'){
                $value = str_replace('.','_', $permission);
            }

            $result[$value] = $value;
        }

        return $result;
    }

    protected function getValidateRules()
    {
        $id = $this->form[$this->model->getPrimaryKey()] ?? 'null';

        return [
            'form.prf_name' => 'required|min:3|max:60|unique:hermes_profiles,prf_name,'.$id.',prf_id'
        ];
    }
}
