<div class="mod-pace-custom">
    @if($isOpen)
        @include('Hermes::security.users.form')
    @endif

    <x-slot name="pageHeading">
        <span class="fw-300">GERENCIAMENTO </span> USUÁRIOS
        <small>Crie usuários para acesso ao sistema.</small>
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
    <livewire:hermes:security:users.grid></livewire:hermes:security:users.grid>
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
