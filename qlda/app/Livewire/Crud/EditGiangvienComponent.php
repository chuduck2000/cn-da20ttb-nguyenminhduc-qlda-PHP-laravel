<?php

namespace App\Livewire\Crud;

use App\Models\Giangvien;
use Livewire\Component;

class EditGiangvienComponent extends Component
{
    public $MSGV, $name, $email, $giangvien_edit;

    public function mount($id)
    {
        $giangvien = Giangvien::where('id', $id)->first();

        $this->MSGV = $giangvien->MSGV;
        $this->name = $giangvien->name;
        $this->email = $giangvien->email;

        $this->giangvien_edit = $giangvien->id;
    }
    public function update($fields)
    {
        $this->validateOnly($fields, [
            'MSGV' => 'required|unique:giangviens,MSGV,' . $this->giangvien_edit . '',
            'name' => 'required|unique:giangviens,name,' . $this->giangvien_edit . '',
            'email' => 'required|unique:giangviens,email,' . $this->giangvien_edit . '',
        ]);
    }

    public function updateGiangvien()
    {
        $this->validate([
            'MSGV' => 'required|unique:giangviens,MSGV,' . $this->giangvien_edit . '',
            'name' => 'required|unique:giangviens,name,' . $this->giangvien_edit . '',
            'email' => 'required|unique:giangviens,email,' . $this->giangvien_edit . '',
        ]);


        $giangvien = Giangvien::where('id', $this->giangvien_edit)->first();

        $giangvien->MSGV = $this->MSGV;
        $giangvien->name = $this->name;
        $giangvien->email = $this->email;

        $giangvien->save();

        session()->flash('message', 'Sửa thông tin thành công');
        return redirect()->route('giangvien');
    }

    public function render()
    {
        return view('livewire.crud.edit-giangvien-component')->layout('livewire.layouts.base');
    }
}
