<?php

namespace App\Http\Livewire\SetupPage;

use App\Models\ChartOfAccount as ChartOfAccountModel;
use Livewire\Component;

class ChartOfAccount extends Component
{
    public    $modal_title;
    public    $chart_of_account_id;
    public    $name;
    public    $status;
    public    $descr;
    protected $listeners = ['bindChartOfAccountEdit'];

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
}
