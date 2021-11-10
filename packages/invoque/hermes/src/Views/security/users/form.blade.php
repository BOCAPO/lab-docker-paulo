<div autofocus style="padding-right: 0px; display: block;" wire:keydown.escape="closeForm()" data-backdrop="false" data-keyboard="false" class="modal fade form-modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <form wire:submit.prevent="store()" method="POST">
        <div class="modal-dialog modal-dialog-right">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4">GERENCIAMENTO DE USUÁRIO</h5>
                    <button wire:click="closeForm()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card mb-5">
                        <div class="card-body p-3">
                            <input type="hidden" wire:model.defer="form.usr_id">
                            <div class="form-group mb-3">
                                <label class="form-label">Usuário: *</label>
                                <input type="text" wire:model.defer="form.usr_username" class="form-control {{$errors->has('form.usr_username') ? 'is-invalid' : ''}}">
                                @error('form.usr_username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Perfil: *</label>
                                <select place wire:model.defer="form.usr_prf_id" class="form-control {{$errors->has('form.usr_username') ? 'is-invalid' : ''}}">
                                    <option selected>Selecione</option>
                                    @foreach($profiles as $key => $profile)
                                        <option value="{{$key}}">{{$profile}}</option>
                                    @endforeach
                                </select>
                                @error('form.usr_username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Senha: *</label>
                                <input type="password" wire:model.defer="form.usr_password" class="form-control {{$errors->has('form.usr_password') ? 'is-invalid' : ''}}">
                                @error('form.usr_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Confirmar senha:*</label>
                                <input type="password" wire:model.defer="form.usr_password_confirmed" class="form-control {{$errors->has('form.usr_password_confirmed') ? 'is-invalid' : ''}}">
                                @error('form.usr_password_confirmed')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Perfil: *</label>
                                <select place wire:model.defer="form.usr_active" class="form-control {{$errors->has('form.usr_active') ? 'is-invalid' : ''}}">
                                    <option selected>Selecione</option>
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                                @error('form.usr_active')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect waves-themed" wire:click="closeForm()">Cancelar</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-themed">Salvar</button>
                </div>
            </div>
        </div>
    </form>
</div>
