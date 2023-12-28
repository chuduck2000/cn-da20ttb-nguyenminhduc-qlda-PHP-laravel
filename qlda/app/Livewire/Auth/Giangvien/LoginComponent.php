<?php

namespace App\Livewire\Auth\Giangvien;

use App\Models\Giangvien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Import Hash class
use Livewire\Component;

class LoginComponent extends Component
{
    public $email, $password;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    public function adminLogin()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $getGiangvien = Giangvien::where('email', $this->email)->first();

        if ($getGiangvien) {
            if (Hash::check($this->password, $getGiangvien->password)) {
                Auth::guard('giangvien')->attempt(['email' => $this->email, 'password' => $this->password]);

                session()->flash('success', 'Login Successful');
                return redirect()->route('giangvien.dashboard');
            } else {
                session()->flash('error', 'Email hoặc Mật khẩu không đúng');
            }
        } else {
            session()->flash('error', 'Email hoặc Mật khẩu không đúng');
        }
    }

    public function render()
    {
        return view('livewire.auth.giangvien.login-component')->layout('livewire.auth.giangvien.layout');
    }
}
