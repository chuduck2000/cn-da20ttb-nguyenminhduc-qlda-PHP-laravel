<?php

namespace App\Livewire\Crud;

use App\Models\Giangvien;
use Livewire\Component;

class IndexGVComponent extends Component
{
    public $s;
    public $search;
    public function delete($id)
    {
        $giangvien = Giangvien::where('id', $id)->first();
        $giangvien->delete();

        session()->flash('message', 'Xóa thành công!!!');
    }
    public function render()
    {
        $giangviens = Giangvien::all();

        if (!$this->s) {
            $giangviens = Giangvien::simplePaginate($this->search);
        } else {
            $giangviens = Giangvien::where('name', 'like', '%' . $this->s . '%')
                ->orwhere('email', 'like', '%' . $this->s . '%')
                ->simplePaginate($this->search);
        }

        return view('livewire.crud.index-g-v-component', ['giangviens' => $giangviens])->layout('livewire.layouts.base');
    }
    public function updateS()
    {
        $this->resetPage(); // If you are using pagination, reset the page when search term changes
    }
}
