<div class="mod-pace-custom">
    @if($isOpen)
        @include('livewire.client.form')
    @endif

    @if($isOpenDetails)
        @include('livewire.client.details')
    @endif

    <x-slot name="pageHeading">
        <span class="fw-300">GERENCIAMENTO </span> CLIENTES
        <small>Geenciamento de Cadastro de Clientes</small>
    </x-slot>

    <x-slot name="headerButton">
        @livewire('zeus:actionButton', [
            'data' => [
                [
                    'label' => 'Novo',
                    'icon' => 'fal fa-plus',
                    'class' => 'btn btn-primary waves-effect waves-themed btnRemove',
                    'type' => 'livewire',
                    'target' => '',
                    'action' => 'wire:click=$emit("openCreate")'
                ],
            ],
        ])
    </x-slot>
    <livewire:client.client-grid-component></livewire:client.client-grid-component>
</div>

@section('script')
    <script type="text/javascript">
        window.livewire.on('triggerDelete', id => {
            Swal.fire({
                title: 'Tem certeza que deseja excluir?',
                text: 'Você não poderá recuperar essa informação!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#aaa',
                confirmButtonText: 'Deletar!',
                cancelButtonText: 'Não, quero cancelar!',
                cancelButtonColor: '#ef4546',
            }).then((result) => {
                //if user clicks on delete
                if (result.value) {
                    @this.call('delete',id);
                }
            });
        })
    </script>
@endsection
