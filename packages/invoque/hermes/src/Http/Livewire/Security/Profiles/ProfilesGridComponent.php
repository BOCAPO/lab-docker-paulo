<?php

namespace Invoque\Hermes\Http\Livewire\Security\Profiles;

use Illuminate\Database\Eloquent\Builder;
use Invoque\Hermes\Models\Profiles;
use Invoque\Zeus\Livewires\ActionButtonComponent;
use Invoque\Zeus\Models\BaseModel;
use Invoque\Zeus\Livewires\BaseTableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProfilesGridComponent extends BaseTableComponent
{
    use HtmlComponents;

    public $sortField = 'prf_id';

    public function query() : Builder
    {
        return Profiles::query();
    }

    public function setTableDataAttributes($attribute, $value): array
    {
        if($attribute == 'actions') { return ['style' => 'width: 10px; text-align:center; padding:3px']; }
        return [];
    }

    public function columns() : array
    {
        return [
            Column::make('Perfil', 'prf_name')->searchable()->sortable(),
            Column::make('Descrição', 'prf_description')->searchable()->sortable(),
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

