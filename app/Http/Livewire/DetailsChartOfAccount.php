<?php

namespace App\Http\Livewire;

use App\Models\AssigedGLAccount;
use App\Models\AssignedCategory;
use App\Models\ChartOfAccount;
use App\Models\GLAccount as GLAccountAlias;
use App\Models\GLCategory;
use Livewire\Component;

class DetailsChartOfAccount extends Component
{
    public    $chart_of_account_id;
    public    $gl_account_list;
    public    $gl_category_list;
    public    $selected_gl_account;
    public    $selected_gl_category;
    protected $listeners = ['destroyAssignedGLAccount', 'destroyAssignedGLCategory'];

    public function mount($id)
    {
        $this->selected_gl_account  = '';
        $this->selected_gl_category = '';
        $this->gl_account_list      = GLAccountAlias::query()->select(['id', 'account', 'name'])->get();
        $this->gl_category_list     = GLCategory::query()->select(['id', 'name'])->get();
        $this->chart_of_account_id  = decrypt($id);
    }

    public function render()
    {
        return view('livewire.details-chart-of-account',
            ['result' => ChartOfAccount::find($this->chart_of_account_id)]);
    }

    public function assignGLAccount()
    {
        $this->validate([
            'selected_gl_account' => 'required',
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

    public function assignGLCategory()
    {
        $this->validate([
            'selected_gl_category' => 'required',
        ]);

        AssignedCategory::create([
            'parent_g_l_category_id' => $this->selected_gl_category,
            'child_g_l_category_id'  => null,
            'chart_of_account_id'    => $this->chart_of_account_id,
        ]);

        $this->selected_gl_category = null;
        $this->emit('refreshDatatable');

        session()->flash('message', 'New GL Category has been assigned.');
    }

    public function destroyAssignedGLAccount()
    {
        session()->flash('message', 'Assigned GL Account has been deleted.');
    }

    public function destroyAssignedGLCategory()
    {
        session()->flash('message', 'Assigned GL Category has been deleted.');
    }
}
