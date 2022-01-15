<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\GLCategory;

class GLCategoryTable extends DataTableComponent
{

    public function columns()
    : array
    {
        return [
            Column::make('Date Created', 'created_at')->sortable()->searchable(),
            Column::make('Name', 'name')->sortable()->searchable(),
            Column::make('Status', 'status')->sortable()->searchable(),
            Column::make('Type', 'type')->sortable()->searchable(),
        ];
    }

    public function query()
    : Builder
    {
        return GLCategory::query();
    }

    public function rowView()
    : string
    {
        return 'livewire-tables.rows.g_l_category_table';
    }

    public function bindEdit($id)
    {
        $this->emit('bindEditGLCategories', [$id]);
    }
}
