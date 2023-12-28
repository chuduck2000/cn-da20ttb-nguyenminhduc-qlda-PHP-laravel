<?php

namespace App\Livewire\Auth\Giangvien;

use App\Models\Giangvien;
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
            'email' => 'required|email|unique:giangviens',
            'password' => 'required|min:6|max:30',
        ]);
    }

    public function giangvienRegistration()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:giangviens',
            'password' => 'required|min:6|max:30',
        ]);

        $giangvien = new Giangvien();
        $giangvien->name = $this->name;
        $giangvien->email = $this->email;
        $giangvien->password = Hash::make($this->password);
        if ($giangvien->save()) {
            Auth::guard(('giangvien'))->attempt(['email' => $this->email, 'password' => $this->password]);
            session()->flash('succes', 'Registration successful');
            return redirect()->route('giangvien.dashboard');
        }
    }

    public function render()
    {
        return view('livewire.auth.giangvien.registration-component')->layout('livewire.auth.giangvien.layout');
    }
}
