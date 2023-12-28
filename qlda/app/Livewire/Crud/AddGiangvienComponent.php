<?php

namespace App\Livewire\Crud;

use App\Models\Giangvien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddGiangvienComponent extends Component
{
    public $MSGV, $name, $email, $password;

    public function update($fields)
    {
        $this->validateOnly($fields, [
            'MSGV' => 'required|unique:giangviens',
            'name' => 'required',
            'email' => 'required|email|unique:giangviens',
            'password' => 'required|min:6|max:30',
        ]);
    }
    public function addGiangvien()
    {
        $this->validate([
            'MSGV' => 'required|unique:giangviens',
            'name' => 'required',
            'email' => 'required|email|unique:giangviens',
            'password' => 'required|min:6|max:30',
        ]);

        $giangvien = new Giangvien();

        $giangvien->MSGV = $this->MSGV;
        $giangvien->name = $this->name;
        $giangvien->email = $this->email;
        $giangvien->password = Hash::make($this->password);

        if ($giangvien->save()) {
            Auth::guard(('giangvien'))->attempt(['email' => $this->email, 'password' => $this->password]);
            session()->flash('succes', 'Đăng ký thành công');
            return redirect()->route('giangvien');
        }
    }

    public function render()
    {
        return view('livewire.crud.add-giangvien-component')->layout('livewire.layouts.base');
    }
}
