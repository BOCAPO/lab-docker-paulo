<div autofocus style="padding-right: 0px; display: block; height: 100vh;  overflow-y: auto;" wire:keydown.escape="closeForm()" data-backdrop="false" data-keyboard="false" class="modal fade form-modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <form wire:submit.prevent="store()" method="POST">
        <div class="modal-dialog modal-dialog-right">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4">GERENCIAMENTO DE CLIENTES</h5>
                    <button wire:click="closeForm()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card mb-5">
                        <div class="card-body p-3">
                            <h3 class="text-primary">Dados Clientes</h3>

                            <input type="hidden" wire:model.defer="form.cli_id">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Nome do Cliente</label>
                                        <input type="text" wire:model.defer="form.cli_name" class="form-control {{$errors->has('form.cli_name') ? 'is-invalid' : ''}}">
                                        @error('form.cli_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Tip Documento: *</label>
                                        <select place wire:model.defer="form.cli_type" placeholder="Selecione" class="form-control {{$errors->has('form.cli_type') ? 'is-invalid' : ''}}">
                                            <option>Selecione</option>
                                            <option value="CPF">CPF</option>
                                            <option value="CNPJ">CNPJ</option>
                                        </select>
                                        @error('form.cli_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">CPF/CNPJ</label>
                                        <input type="text" wire:model.defer="form.cli_document" class="form-control {{$errors->has('form.cli_document') ? 'is-invalid' : ''}}">
                                        @error('form.cli_document')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            @include('livewire.basic.address')
                            @include('livewire.basic.contact')

                            <h3 class="text-primary">Configuração</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Código Externo*</label>
                                        <input type="text" wire:model.defer="form.cli_id_external" class="form-control {{$errors->has('form.cli_id_external') ? 'is-invalid' : ''}}">
                                        @error('form.cli_id_external')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Ativo? *</label>
                                        <select place wire:model.defer="form.cli_active" placeholder="Selecione" class="form-control {{$errors->has('form.cli_active') ? 'is-invalid' : ''}}">
                                            <option>Selecione</option>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>
                                        @error('form.cli_active')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
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
<script type="text/javascript">
    initApp.listFilter($('#js_nested_list'));
    initApp.buildNavigation($('#js_nested_list'));
</script>
