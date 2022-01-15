<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\GLAccount;

class GLAccountTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Date Create', 'created_at')->sortable()->searchable(),
            Column::make('GL Account', 'account')->sortable()->searchable(),
            Column::make('Posting Account', 'posting_account')->sortable()->searchable(),
            Column::make('GL Account Name', 'name')->sortable()->searchable(),
            Column::make('Status', 'status')->sortable()->searchable(),
            Column::make('Type', 'type')->sortable()->searchable(),
            Column::make('Designation', 'designation')->sortable()->searchable(),
        ];
    }

    public function query(): Builder
    {
        return GLAccount::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.g_l_account_table';
    }

    public function bindForEdit($id)
    {
        $this->emit('bindForEditGLAccount', $id);
    }
}
