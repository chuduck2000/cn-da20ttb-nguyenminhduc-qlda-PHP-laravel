<?php

namespace App\Livewire\Crud;

use App\Models\Sinhvien;
use Livewire\Component;

class IndexComponent extends Component
{
    public $s;
    public $search;

    public function delete($id)
    {
        $sinhvien = Sinhvien::where('id', $id)->first();
        $sinhvien->delete();

        session()->flash('message', 'Xóa thành công!!!');
    }
    public function render()
    {
        $sinhviens = Sinhvien::all();

        if (!$this->s) {
            $sinhviens = Sinhvien::simplePaginate($this->search);
        } else {
            $sinhviens = Sinhvien::where('name', 'like', '%' . $this->s . '%')
                ->orwhere('email', 'like', '%' . $this->s . '%')
                ->simplePaginate($this->search);
        }

        return view('livewire.crud.index-component', ['sinhviens' => $sinhviens])->layout('livewire.layouts.base');
    }

    public function updateS()
    {
        $this->resetPage(); // If you are using pagination, reset the page when search term changes
    }
}
