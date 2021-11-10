<?php

namespace Invoque\Zeus\Livewires;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;

class BaseTableComponent extends TableComponent
{
    public $clearSearchButton = false;
    public $sortDefaultIcon = '<i class="fal fa-sort"></i>';
    public $descSortIcon = '<i class="fal fa-sort-alpha-up"></i>';
    public $ascSortIcon = '<i class="fal fa-sort-alpha-down"></i>';
    public $perPage = 9;

    public $listeners = ['dataReload' => 'render'];

    public function query(): Builder
    {
        // TODO: Implement query() method.
    }

    function columns(): array
    {
        // TODO: Implement columns() method.
    }
}
