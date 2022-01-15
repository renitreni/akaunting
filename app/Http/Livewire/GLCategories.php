<?php

namespace App\Http\Livewire;

use App\Models\GLCategory;
use Livewire\Component;

class GLCategories extends Component
{
    public $GL_category_form;
    public $category_id;
    public $name;
    public $status;
    public $type;
    public $descr;

    protected $listeners = ['bindEditGLCategories'];

    protected $messages = [
        'descr.required' => 'The description is required.',
    ];

    public function render()
    {
        return view('livewire.g-l-categories');
    }

    public function newGLCategory()
    {
        $this->GL_category_form = 'Create New Category';
        $this->name             = '';
        $this->status           = '';
        $this->type             = '';
        $this->descr            = '';
        $this->category_id      = null;
    }

    public function saveGLCategory()
    {
        $this->validate([
            'name'   => 'required',
            'status' => 'required',
            'type'   => 'required',
            'descr'  => 'required',
        ]);

        GLCategory::updateOrCreate(['id' => $this->category_id ?? ''], [
            'name'   => $this->name,
            'status' => $this->status,
            'type'   => $this->type,
            'descr'  => $this->descr,
        ]);

        $this->emit('refreshDatatable');

        session()->flash('message',
            $this->category_id ? 'GL Category successfully updated.' : 'New GL Category successfully added.');
    }

    public function bindEditGLCategories($id)
    {
        $result = GLCategory::where('id', $id)->get()->first();

        $this->GL_category_form = 'Create New Category';
        $this->name             = $result->name;
        $this->status           = $result->status;
        $this->type             = $result->type;
        $this->descr            = $result->descr;
        $this->category_id      = $result->id;
    }

    public function destroy()
    {
        GLCategory::destroy($this->category_id);

        $this->emit('refreshDatatable');

        session()->flash('message', 'GL Category has been deleted.');
    }
}
