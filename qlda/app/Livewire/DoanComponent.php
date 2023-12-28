<?php

namespace App\Livewire;

use App\Models\Doan;
use Livewire\Component;

class DoanComponent extends Component
{
    public $doan_id, $name, $type_id, $namhoc_id;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'doan_id' => 'required|unique:doans',
            'name' => 'required',
            'type_id' => 'required|unique:loai_doans',
            'namhoc_id' => 'required|unique:namhocs',
        ]);
    }

    public function storeDoanData()
    {
        $this->validate([
            'doan_id' => 'required|unique:doans',
            'name' => 'required',
            'type_id' => 'required|unique:loai_doans',
            'namhoc_id' => 'required|unique:namhocs',
        ]);

        $doan = new Doan();
        $doan->doan_id = $this->doan_id;
        $doan->name = $this->name;
        $doan->type_id = $this->type_id;
        $doan->namhoc_id = $this->namhoc_id;

        $doan->save();
        session()->flash('mesage', 'Đồ án mới đã được thêm thành công');
    }

    public function render()
    {
        return view('livewire.doan-component')->layout('livewire.layouts.base');
    }
}
