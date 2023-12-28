<?php

namespace App\Livewire\Crud;

use App\Models\Sinhvien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddSinhvienComponent extends Component
{
    public $MSSV, $name, $email, $password;

    public function update($fields)
    {
        $this->validateOnly($fields, [
            'MSSV' => 'required|unique:sinhviens',
            'name' => 'required',
            'email' => 'required|email|unique:sinhviens',
            'password' => 'required|min:6|max:30',
        ]);
    }

    public function addSinhvien()
    {
        $this->validate([
            'MSSV' => 'required|unique:sinhviens',
            'name' => 'required',
            'email' => 'required|email|unique:sinhviens',
            'password' => 'required|min:6|max:30',
        ]);

        $sinhvien = new Sinhvien();

        $sinhvien->MSSV = $this->MSSV;
        $sinhvien->name = $this->name;
        $sinhvien->email = $this->email;
        $sinhvien->password = Hash::make($this->password);

        if ($sinhvien->save()) {
            Auth::guard(('sinhvien'))->attempt(['email' => $this->email, 'password' => $this->password]);
            session()->flash('succes', 'Đăng ký thành công');
            return redirect()->route('sinhvien');
        }

        // $sinhvien->save();
        // session()->flash('succes', 'đăng ký thành công');

        // $this->MSSV = '';
        // $this->name = '';
        // $this->email = '';
        // $this->password = '';
    }

    public function render()
    {
        return view('livewire.crud.add-sinhvien-component')->layout('livewire.layouts.base');
    }
}
