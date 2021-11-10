<?php

namespace App\Http\Livewire\Client;

use App\Http\Requests\AddressRequest;
use App\Http\Requests\ContactRequest;
use App\Models\Client;
use App\Models\ClientUser;
use App\Models\Register;
use Illuminate\Database\Eloquent\Model;
use Invoque\Hermes\Models\User;
use Invoque\Zeus\Livewires\BaseComponent;
use Invoque\Zeus\Util\Format;
use DB;

class ClientComponent extends BaseComponent
{
    public $itens;
    public $search = [];
    public $registerAvailable;
    public $register;
    public $formClientRegister;
    public $dataClientsRegisters;

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->model = new Client();

        $this->getRegisterAvailable();
    }

    public function render()
    {
        return view('livewire.client.index');
    }

    public function details($id)
    {
        parent::details($id);
        $this->getLoadClientsRegisters($this->form['cli_id']);
    }

    protected function getValidateRules()
    {
        $id = $this->form[$this->model->getPrimaryKey()] ?? 'null';

        $data = [
            'form.cli_document' => 'required|cpfcnpj|max:180|unique:app_clients,cli_document,'.$id.',cli_id',
            'form.cli_name' => 'required',
            'form.cli_type' => 'required',
            'form.cli_id_external' => 'required',
            'form.cli_active' => 'required',
        ];

        $address = new AddressRequest();
        $contact = new ContactRequest();

        return array_merge($data, $address->rules(), $contact->rules());
    }

    public function store()
    {
        $address = Format::addressJson($this->form);
        $contact = Format::contactJson($this->form);

        $this->form['cli_address'] = $address;
        $this->form['cli_contact'] = $contact;

        return parent::store();
    }

    public function storeClientRegister(){
        $this->validate(['formClientRegister.clr_reg_id' => 'required']);

        $result = DB::insert('insert into app_clients_register(clr_reg_id, clr_cli_id) values (?, ?)', [
            $this->formClientRegister['clr_reg_id'], $this->form['cli_id']]);

        $register = $this->register->find($this->formClientRegister['clr_reg_id']);

        //Faço o update e ativo o usuario
        $user = $register->user;
        $user->usr_active = true;
        $user->save();

        if($result) {
            $this->getRegisterAvailable();
            $this->getLoadClientsRegisters($this->form['cli_id']);
            return $this->swalNotification('Usuário adicionado com sucesso', 'success');
        }
    }

    private function getRegisterAvailable()
    {
        $this->register = new Register();

        //Capturo todos os registro com vinculo no cliente
        $registerClient = DB::select('SELECT clr_reg_id FROM app_clients_register');
        $registerClient = array_map(function ($value) { return $value->clr_reg_id; }, $registerClient);

        //Carrego todos os registro que não estão vinculados a um cliente
        $this->registerAvailable =  $this->register->whereNotIn('reg_id', $registerClient)->orderBy('reg_name')->get();
    }

    private function getLoadClientsRegisters($cliId) {
        $client = $this->model->find($cliId);
        $this->dataClientsRegisters = $client->registers;
    }

    public function removeClientRegister($cliId, $regId) {
        $result = DB::table('app_clients_register')->where('clr_cli_id', '=', $cliId)->where('clr_reg_id', '=', $regId)->delete();

        if($result) {
            //DESATIVO O USUARIO
            $register = $this->register->find($regId);

            //Faço o update e ativo o usuario
            $user = $register->user;
            $user->usr_active = false;
            $user->save();

            $this->getRegisterAvailable();
            $this->getLoadClientsRegisters($cliId);

            return $this->swalNotification('Usuário desvínculado com sucesso', 'success');
        }
    }
}
