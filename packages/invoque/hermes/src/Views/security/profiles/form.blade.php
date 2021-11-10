<div autofocus style="padding-right: 0px; display: block; height: 100vh;  overflow-y: auto;" wire:keydown.escape="closeForm()" data-backdrop="false" data-keyboard="false" class="modal fade form-modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <form wire:submit.prevent="store()" method="POST">
        <div class="modal-dialog modal-dialog-right">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4">GERENCIAMENTO DE PERFIS</h5>
                    <button wire:click="closeForm()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card mb-5">
                        <div class="card-body p-3">
                            <input type="hidden" wire:model.defer="form.prf_id">
                            <div class="form-group mb-3">
                                <label class="form-label">Perfil</label>
                                <input type="text" wire:model.defer="form.prf_name" class="form-control {{$errors->has('form.prf_name') ? 'is-invalid' : ''}}">
                                @error('form.prf_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Descrição</label>
                                <textarea rows="2" wire:model.defer="form.prf_description" type="text" class="form-control {{$errors->has('form.prf_description') ? 'is-invalid' : ''}}"></textarea>
                                @error('form.prf_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="filter-message js-filter-message m-0 text-left pl-4 py-3 fw-500"></div>
                            <div data-spy="scroll" data-target="#spyscroll-1" data-offset="0" class="overflow-auto" style="height:400px">
                                <ul id="js_nested_list" class="nav-menu nav-menu-reset nav-menu-compact bg-primary-900 bg-info-gradient mb-sm-4 mb-md-0 rounded" data-nav-accordion="true">
                                    @include('Hermes::menu.tree', ['itens' => config('menu')])
                                </ul>
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
