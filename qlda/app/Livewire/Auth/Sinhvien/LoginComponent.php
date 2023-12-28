<?php

namespace App\Livewire\Auth\Sinhvien;

use App\Models\Sinhvien;
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

        $getSinhvien = Sinhvien::where('email', $this->email)->first();

        if ($getSinhvien) {
            if (Hash::check($this->password, $getSinhvien->password)) {
                Auth::guard('sinhvien')->attempt(['email' => $this->email, 'password' => $this->password]);

                session()->flash('success', 'Login Successful');
                return redirect()->route('sinhvien.dashboard');
            } else {
                session()->flash('error', 'Email hoặc Mật khẩu không đúng');
            }
        } else {
            session()->flash('error', 'Email hoặc Mật khẩu không đúng');
        }
    }
    public function render()
    {
        return view('livewire.auth.sinhvien.login-component')->layout('livewire.auth.sinhvien.layout');
    }
}
