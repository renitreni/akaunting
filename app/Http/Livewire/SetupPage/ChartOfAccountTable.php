<?php

namespace App\Http\Livewire\SetupPage;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\ChartOfAccount;

class ChartOfAccountTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Date Created', 'created_at')->sortable()->searchable(),
            Column::make('Name')->sortable()->searchable(),
            Column::make('Status')->sortable()->searchable(),
            Column::make('Actions')->sortable()->searchable(),
        ];
    }

    public function query(): Builder
    {
        return ChartOfAccount::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.chart_of_account_table';
    }

    public function bindToEdit($id)
    {
        $this->emit('bindChartOfAccountEdit',[$id]);
    }
}
