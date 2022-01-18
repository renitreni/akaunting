<?php

namespace App\Http\Livewire\SetupPage;

use App\Models\AssigedGLAccount;
use App\Models\ChartOfAccount as ChartOfAccountModel;
use App\Models\GLAccount as GLAccountAlias;
use Livewire\Component;

class ChartOfAccount extends Component
{
    public    $modal_title;
    public    $chart_of_account_id;
    public    $name;
    public    $status;
    public    $descr;
    protected $listeners = ['bindChartOfAccountEdit'];
    public    $gl_account_list;
    public    $selected_gl_account;

    public function mount()
    {
        $this->selected_gl_account = '';
        $this->gl_account_list     = GLAccountAlias::query()->select(['id', 'account', 'name'])->get();
    }

    public function render()
    {
        return view('livewire.setup-page.chart-of-account');
    }

    public function newChartOfAccount()
    {
        $this->modal_title         = 'Create Chart Of Account';
        $this->chart_of_account_id = null;
        $this->name                = '';
        $this->status              = '';
        $this->descr               = '';
    }

    public function bindChartOfAccountEdit($id)
    {
        $result = ChartOfAccountModel::where('id', $id)->get()->first();

        $this->modal_title         = 'Edit Chart Of Account';
        $this->chart_of_account_id = $result->id;
        $this->name                = $result->name;
        $this->status              = $result->status;
        $this->descr               = $result->descr;
    }

    public function saveChartOfAccount()
    {
        ChartOfAccountModel::updateOrCreate(['id' => $this->chart_of_account_id ?? ''], [
            'name'   => $this->name,
            'status' => $this->status,
            'descr'  => $this->descr,
        ]);

        $this->emit('refreshDatatable');

        session()->flash('message',
            $this->chart_of_account_id ? 'Chart Of Account successfully updated.' : 'New Chart Of Account successfully added.');
    }

    public function destroy()
    {
        ChartOfAccountModel::destroy($this->chart_of_account_id);

        $this->emit('refreshDatatable');

        session()->flash('message', 'Chart Of Account successfully deleted.');
    }
}
