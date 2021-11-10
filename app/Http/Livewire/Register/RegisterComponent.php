<?php

namespace App\Http\Livewire\Register;

use App\Models\Register;
use Invoque\Hermes\Models\Profiles;
use Invoque\Hermes\Models\User;
use Invoque\Zeus\Livewires\BaseComponent;
use DB;

class RegisterComponent extends BaseComponent
{
    public $itens;
    public $search = [];
    public $profiles = [];

    public $user;
    public $profile;

    public $state = 'form';

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->model = new Register();
        $this->user = new User();
        $this->profile = new Profiles();

        $this->form['reg_check'] = null;
        $this->form['reg_password'] = null;
    }

    public function render()
    {
        return view('livewire.register.index')->layout('themes.smart.layouts.auth');
    }

    protected function getValidateRules()
    {
        $id = $this->form[$this->model->getPrimaryKey()] ?? 'null';

        return [
            "form.reg_name" => 'required|min:3',
            "form.reg_phone" => "required",
            'form.reg_email' => 'required|email|min:3|max:60|unique:app_register,reg_email,'.$id.',reg_id',
            "form.reg_password" => "required",
            "form.reg_password_confirmed" => "required|min:6|same:form.reg_password",
            "form.reg_check" => "required|boolean:true"
        ];
    }

    public function store()
    {
        $this->validate($this->getValidateRules());

        try{
            DB::connection()->getPdo()->beginTransaction();

            $profile = $this->profile->where('prf_name', '=', 'CLIENTE')->first();
            $user = $this->user->create(
                [
                    'usr_username' => $this->form['reg_email'],
                    'usr_password' => bcrypt($this->form['reg_password']),
                    'usr_prf_id' => $profile->prf_id,
                    'usr_active' => 0
                ]
            );

            $this->form['reg_usr_id'] = $user->usr_id->toString();

            $register = $this->model->create($this->form);

            DB::connection()->getPdo()->commit();
            $this->state = 'confirmed';
        }catch (\Exception $e) {
            DB::connection()->getPdo()->rollBack();

            $this->state = 'form';

            if(env('APP_DEBUG')){ dd($e->getMessage()); }
            return $this->swalNotification($e->getMessage(), 'error');
        }
    }
}
