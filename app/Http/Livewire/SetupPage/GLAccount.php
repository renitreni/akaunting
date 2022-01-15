<?php

namespace App\Http\Livewire\SetupPage;

use App\Models\GLAccount as GLAccountModel;
use Livewire\Component;

class GLAccount extends Component
{
    public $GL_form_title;
    public $account_id;
    public $account;
    public $name;
    public $status;
    public $desc;
    public $posting_account;
    public $type;
    public $designation;
    public $type_list = [
        'Asset'     => [
            'Cash',
            'Unbilled AR',
            'Billed AR',
            'AR Reserve',
            'Sales Reserve',
            'Contract Asset',

        ],
        'Liability' => [
            'Customer Prepaid Liability',
            'Sales Tax Liability',
            'Deferred Revenue',
        ],
        'Equity'    => [
            'Equity',
        ],
        'Revenue'   => [
            'Recognized Revenue',
            'Sales Allowance',
        ],
        'Expense'   => [
            'Bank Fee',
            'Sales Tax Expense',
        ],
        'All Types' => [
            'None',
        ],
    ];

    protected    $listeners = ['bindForEditGLAccount'];
    public array $designation_list;

    public function render()
    {
        return view('livewire.setup-page.g-l-account');
    }

    public function mount()
    {
        $this->type             = "All Types";
        $this->designation      = "None";
        $this->designation_list = $this->type_list[$this->type];
        $this->posting_account  = null;
    }

    public function updatedType()
    {
        $this->designation      = "";
        $this->designation_list = $this->type_list[$this->type];
    }


    public function newGLAccount()
    {
        $this->GL_form_title   = 'Create GL Account';
        $this->account         = '';
        $this->name            = '';
        $this->desc            = '';
        $this->posting_account = null;
        $this->status          = 'Active';
        $this->type            = "All Types";
        $this->designation     = "None";
        $this->account_id      = null;
    }

    public function saveGLAccount()
    {
        $this->validate([
            'account'     => 'required',
            'name'        => 'required',
            'status'      => 'required',
            'type'        => 'required',
            'designation' => 'required',
        ]);

        GLAccountModel::updateOrCreate(['id' => $this->account_id ?? ''],
            [
                'account'         => $this->account,
                'name'            => $this->name,
                'status'          => $this->status,
                'desc'            => $this->desc,
                'posting_account' => $this->posting_account,
                'type'            => $this->type,
                'designation'     => $this->designation,
            ]);

        $this->emit('refreshDatatable');

        session()->flash('message',
            $this->account_id ? 'GL Account successfully updated.' : 'New GL Account successfully added.');
    }

    public function bindForEditGLAccount($id)
    {
        $this->GL_form_title = 'Edit GL Account';

        $results = GLAccountModel::find($id);

        $this->account_id      = $results->id;
        $this->account         = $results->account;
        $this->name            = $results->name;
        $this->status          = $results->status;
        $this->desc            = $results->desc;
        $this->posting_account = $results->posting_account;
        $this->type            = $results->type;
        $this->designation     = $results->designation;
    }

    public function deleteGLAccount()
    {
        GLAccountModel::destroy($this->account_id);

        $this->emit('refreshDatatable');
        session()->flash('message', 'GL Account successfully deleted.');
    }
}
