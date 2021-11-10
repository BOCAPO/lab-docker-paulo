<div autofocus style="padding-right: 0px; display: block; height: 100vh;  overflow-y: auto;" wire:keydown.escape="closeDetails()" data-backdrop="false" data-keyboard="false" class="modal fade form-modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-right modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">GERENCIAMENTO DE USUÁRIO: </h5>
                <button wire:click="closeDetails()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <form wire:submit.prevent="storeClientRegister()" method="POST">
                <div class="modal-body">
                    <h2 class="modal-title h2 text-primary mb-5">{{mb_strtoupper($form['cli_name'])}}</h2>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group mb-3">
                                <label class="form-label">Usuários: *</label>
                                <select wire:model.defer="formClientRegister.clr_reg_id" class="form-control {{$errors->has('formClientRegister.clr_reg_id') ? 'is-invalid' : ''}}">
                                    <option value="" selected>Selecione</option>
                                    @foreach($this->registerAvailable as $key => $register)
                                        <option value="{{$register->reg_id}}">{{$register->reg_name}} :: {{$register->reg_email}}</option>
                                    @endforeach
                                </select>
                                @error('formClientRegister.clr_reg_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-themed">Adicionar</button>
                        </div>
                    </div>

                    <h2 class="modal-title h4 text-primary mt-2 mb-2">Usuários Vínculados</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">#</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($this->dataClientsRegisters as $register)
                                        <tr>
                                            <td scope="col">{{$register->reg_name}}</td>
                                            <td scope="col">{{$register->reg_email}}</td>
                                            <td scope="col">{{$register->reg_phone}}</td>
                                            <td width="30px" scope="col">
                                                <a href="#" wire:click.prevent="removeClientRegister('{{$form['cli_id']}}','{{$register->reg_id}}')" class="btn btn-xs btn-danger waves-effect waves-themed"><i class="fal fa-eraser"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
