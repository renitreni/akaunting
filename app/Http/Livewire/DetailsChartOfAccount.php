<?php

namespace App\Http\Livewire;

use App\Models\ChartOfAccount;
use Livewire\Component;

class DetailsChartOfAccount extends Component
{
    public $chart_of_account_id;

    public function mount($id)
    {
        $this->chart_of_account_id = decrypt($id);
    }

    public function render()
    {
        return view('livewire.details-chart-of-account',
            ['result' => ChartOfAccount::find($this->chart_of_account_id)]);
    }
}
