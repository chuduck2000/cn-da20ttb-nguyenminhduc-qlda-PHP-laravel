<?php

namespace App\Livewire\Auth\Sinhvien;

use App\Models\Sinhvien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegistrationComponent extends Component
{
    public $name, $email, $password;

    public function update($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email|unique:sinhviens',
            'password' => 'required|min:6|max:30',
        ]);
    }

    public function sinhvienRegistration()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:sinhviens',
            'password' => 'required|min:6|max:30',
        ]);

        $sinhvien = new Sinhvien();
        $sinhvien->name = $this->name;
        $sinhvien->email = $this->email;
        $sinhvien->password = Hash::make($this->password);
        if ($sinhvien->save()) {
            Auth::guard(('sinhvien'))->attempt(['email' => $this->email, 'password' => $this->password]);
            session()->flash('succes', 'Registration successful');
            return redirect()->route('sinhvien.dashboard');
        }
    }

    public function render()
    {
        return view('livewire.auth.sinhvien.registration-component')->layout('livewire.auth.sinhvien.layout');
    }
}
