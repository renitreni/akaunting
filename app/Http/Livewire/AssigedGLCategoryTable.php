<?php

namespace App\Http\Livewire;

use App\Models\AssignedCategory;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AssigedGLCategoryTable extends DataTableComponent
{
    public $coa_id;

    public function columns(): array
    {
        return [
            Column::make('GL Category Name', 'name')->sortable()->searchable(),
            Column::make('Status', 'status')->sortable()->searchable(),
            Column::make('Type', 'type')->sortable()->searchable(),
            Column::make('Description', 'descr')->sortable()->searchable(),
            Column::make('Action'),
        ];
    }

    public function query(): Builder
    {
        return AssignedCategory::query()
            ->selectRaw('assigned_categories.id,gla.name,gla.status,gla.type, gla.descr')
            ->where('assigned_categories.chart_of_account_id', $this->coa_id)
            ->leftJoin('g_l_categories as gla', 'gla.id', '=', 'assigned_categories.parent_g_l_category_id');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.assiged_g_l_category_table';
    }

    public function destroy($id)
    {
        AssignedCategory::destroy($id);
        $this->emit('destroyAssignedGLCategory');
    }
}
