<?php

namespace Invoque\Hermes\Http\Livewire\Security\Users;

use Invoque\Hermes\Models\Profiles;
use Invoque\Hermes\Models\User;
use Invoque\Zeus\Livewires\BaseComponent;

class UsersComponent extends BaseComponent
{
    public $itens;
    public $search = [];
    public $profiles = [];

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->model = new User();

        $profile = new Profiles();
        $this->profiles = $profile->orderBy('prf_name', 'desc')->pluck('prf_name', 'prf_id');
    }

    public function render()
    {
        return view('Hermes::security.users.index');
    }

    public function store()
    {
        $this->validate($this->getValidateRules());

        $dataForm = $this->form;
        $dataForm['usr_password'] = bcrypt($dataForm['usr_password']);

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

    protected function getValidateRules()
    {
        $id = $this->form[$this->model->getPrimaryKey()] ?? 'null';

        return [
            'form.usr_prf_id' => 'required|exists:hermes_profiles,prf_id',
            'form.usr_username' => 'required|min:3|max:60|unique:hermes_users,usr_username,'.$id.',usr_id',
            "form.usr_password" => "required|min:4",
            "form.usr_password_confirmed" => "required|min:6|same:form.usr_password"
        ];
    }
}
