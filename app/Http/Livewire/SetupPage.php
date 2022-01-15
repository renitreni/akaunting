<?php

namespace App\Http\Livewire;

use App\Models\GLAccount;
use Livewire\Component;

class SetupPage extends Component
{

    protected $queryString = ['panel'];

    public $panel;

    public function mount()
    {
        $this->panel = request()->query('panel', '1');
    }

    public function render()
    {
        return view('livewire.setup-page');
    }

    public function setPanel($no)
    {
        $this->panel = request()->query('panel', $no);
    }
}
