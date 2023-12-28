<?php

namespace App\Livewire\Crud;

use App\Models\Sinhvien;
use Livewire\Component;

class EditSinhvienComponent extends Component
{
    public $MSSV, $name, $email, $sinhvien_edit;

    public function mount($id)
    {
        $sinhvien = Sinhvien::where('id', $id)->first();

        $this->MSSV = $sinhvien->MSSV;
        $this->name = $sinhvien->name;
        $this->email = $sinhvien->email;

        $this->sinhvien_edit = $sinhvien->id;
    }
    public function update($fields)
    {
        $this->validateOnly($fields, [
            'MSSV' => 'required|unique:sinhviens,MSSV,' . $this->sinhvien_edit . '',
            'name' => 'required|unique:sinhviens,name,' . $this->sinhvien_edit . '',
            'email' => 'required|unique:sinhviens,email,' . $this->sinhvien_edit . '',
        ]);
    }

    public function updateSinhvien()
    {
        $this->validate([
            'MSSV' => 'required|unique:sinhviens,MSSV,' . $this->sinhvien_edit . '',
            'name' => 'required|unique:sinhviens,name,' . $this->sinhvien_edit . '',
            'email' => 'required|unique:sinhviens,email,' . $this->sinhvien_edit . '',
        ]);


        $sinhvien = Sinhvien::where('id', $this->sinhvien_edit)->first();

        $sinhvien->MSSV = $this->MSSV;
        $sinhvien->name = $this->name;
        $sinhvien->email = $this->email;

        $sinhvien->save();

        session()->flash('message', 'Sửa thông tin thành công');
        return redirect()->route('sinhvien');
    }

    public function render()
    {
        return view('livewire.crud.edit-sinhvien-component')->layout('livewire.layouts.base');
    }
}
