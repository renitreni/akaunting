<?php

namespace App\Http\Livewire;

use App\Models\AssigedGLAccount;
use App\Models\ChartOfAccount;
use App\Models\GLAccount as GLAccountAlias;
use Livewire\Component;

class DetailsChartOfAccount extends Component
{
    public $chart_of_account_id;
    public $gl_account_list;
    public $selected_gl_account;
    protected $listeners = ['destroyAssignedGLAccount'];

    public function mount($id)
    {
        $this->selected_gl_account = '';
        $this->gl_account_list     = GLAccountAlias::query()->select(['id', 'account', 'name'])->get();
        $this->chart_of_account_id = decrypt($id);
    }

    public function render()
    {
        return view('livewire.details-chart-of-account',
            ['result' => ChartOfAccount::find($this->chart_of_account_id)]);
    }

    public function assignGLAccount()
    {
        $this->validate([
            'selected_gl_account' => 'required'
        ]);

        AssigedGLAccount::create([
            'parent_g_l_account_id' => $this->selected_gl_account,
            'child_g_l_account_id'  => null,
            'chart_of_account_id'   => $this->chart_of_account_id,
        ]);

        $this->selected_gl_account = null;
        $this->emit('refreshDatatable');

        session()->flash('message', 'New GL Account has been assigned.');
    }

    public function destroyAssignedGLAccount()
    {
        session()->flash('message', 'Assigned GL Account has been deleted.');
    }
}
