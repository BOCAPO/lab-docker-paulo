<?php

namespace Invoque\Hermes\Http\Livewire\Security\Users;

use Illuminate\Database\Eloquent\Builder;
use Invoque\Hermes\Models\User;
use Invoque\Zeus\Livewires\ActionButtonComponent;
use Invoque\Zeus\Models\BaseModel;
use Invoque\Zeus\Livewires\BaseTableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UsersGripComponent extends BaseTableComponent
{
    use HtmlComponents;

    public $sortField = 'usr_id';

    public function query() : Builder
    {
        return User::query();
    }

    public function setTableDataAttributes($attribute, $value): array
    {
        if($attribute == 'actions') { return ['style' => 'width: 10px; text-align:center; padding:3px']; }
        return [];
    }

    public function columns() : array
    {
        return [
            Column::make('Usuário', 'usr_username')->searchable()->sortable(),
            Column::make('Perfil', 'usr_prf_id')->searchable()->sortable()
                ->format(function(BaseModel $model) {
                    return $model->profiles->prf_name;
                }),
            Column::make('Ativo', 'usr_active')->format(function(BaseModel $model) {
                return $model->usr_active ? 'Sim' : 'Não';
            }),
            Column::make('Ação', 'actions')
                ->format(function(BaseModel $model) {
                    $buttons = new ActionButtonComponent();
                    $buttons->style = 'dropdown';
                    $buttons->param = [
                        'label' => '',
                        'icon' => 'fal fa-cog',
                        'classGroup' => 'btn-group dropleft',
                        'class' => 'btn btn-primary rounded-circle btn-icon waves-effect waves-themed'
                    ];
                    $buttons->data = [
                        [
                            'label' => 'Editar',
                            'icon' => 'fal fa-edit',
                            'class' => 'btn btn-primary waves-effect waves-themed',
                            'type' => 'livewire',
                            'target' => '',
                            'action' => 'wire:click=$emit(\'openEdit\',\''.$model->{$model->getPrimaryKey()}.'\')'
                        ],
                        [
                            'label' => 'Excluir',
                            'icon' => 'fal fa-eraser',
                            'class' => 'btn btn-primary waves-effect waves-themed',
                            'type' => 'livewire',
                            'target' => '',
                            'action' => 'wire:click=$emit(\'triggerDelete\',\''.$model->{$model->getPrimaryKey()}.'\')'
                        ],
                    ];
                    return $buttons->renderToView();
                }),
        ];
    }
}

