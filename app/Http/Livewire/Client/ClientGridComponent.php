<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Illuminate\Database\Eloquent\Builder;
use Invoque\Zeus\Livewires\ActionButtonComponent;
use Invoque\Zeus\Models\BaseModel;
use Invoque\Zeus\Livewires\BaseTableComponent;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ClientGridComponent extends BaseTableComponent
{
    use HtmlComponents;

    public $sortField = 'cli_id';

    public function query() : Builder
    {
        return Client::query();
    }

    public function setTableDataAttributes($attribute, $value): array
    {
        if($attribute == 'actions') { return ['style' => 'width: 10px; text-align:center; padding:3px']; }
        return [];
    }

    public function columns() : array
    {
        return [
            Column::make('Cliente', 'cli_name')->searchable()->sortable(),
            Column::make('Documento', 'cli_document')->searchable()->sortable(),
            Column::make('Ativo', 'cli_active')->format(function (BaseModel $model) {
                return $model ? 'Sim' : 'Não';
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
                            'label' => 'Usuários',
                            'icon' => 'fal fa-users',
                            'class' => 'btn btn-green waves-effect waves-themed',
                            'type' => 'livewire',
                            'target' => '',
                            'action' => 'wire:click=$emit(\'openDetails\',\''.$model->{$model->getPrimaryKey()}.'\')'
                        ],
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

