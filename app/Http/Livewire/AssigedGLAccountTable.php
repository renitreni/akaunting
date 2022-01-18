<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\AssigedGLAccount;

class AssigedGLAccountTable extends DataTableComponent
{
    public $coa_id;

    public string $defaultSortColumn = 'id';
    public string $defaultSortDirection = 'desc';

    public function columns()
    : array
    {
        return [
            Column::make('ID', 'id')->sortable()->searchable(),
            Column::make('GL Account', 'gla.account')->sortable()->searchable(),
            Column::make('GL Account Name', 'gla.name')->sortable()->searchable(),
            Column::make('Status', 'gla.status')->sortable()->searchable(),
            Column::make('Type', 'gla.type')->sortable()->searchable(),
            Column::make('Designation', 'gla.designation')->sortable()->searchable(),
            Column::make('Posting Account', 'gla.posting_account')->sortable()->searchable(),
            Column::make('Description', 'gla.desc')->sortable()->searchable(),
            Column::make('Action')
        ];
    }

    public function query()
    : Builder
    {
        return AssigedGLAccount::query()
            ->selectRaw('assiged_g_l_accounts.id,gla.account,gla.name,gla.status,
            gla.type,gla.designation,gla.posting_account,gla.desc')
            ->where('assiged_g_l_accounts.chart_of_account_id', $this->coa_id)
            ->leftJoin('g_l_accounts as gla', 'gla.id', '=', 'assiged_g_l_accounts.parent_g_l_account_id');
    }

    public function rowView()
    : string
    {
        return 'livewire-tables.rows.assiged_g_l_account_table';
    }

    public function destroy($id)
    {
        AssigedGLAccount::destroy($id);
        $this->emit('destroyAssignedGLAccount');
    }
}
