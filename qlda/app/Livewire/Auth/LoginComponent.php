<?php

// app/Http/Livewire/Auth/LoginComponent.php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginComponent extends Component
{
    public $email, $password, $userType;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
        'userType' => 'required|in:admin,giangvien,sinhvien',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function login()
    {
        $this->validate();

        $model = ucfirst($this->userType);

        $user = $model::where('email', $this->email)->first();

        if ($user && Hash::check($this->password, $user->password)) {
            Auth::guard($this->userType)->attempt(['email' => $this->email, 'password' => $this->password]);

            session()->flash('success', 'Login Successful');

            switch ($this->userType) {
                case 'admin':
                    return redirect()->route('admin');
                case 'giangvien':
                    return redirect()->route('giangvien');
                case 'sinhvien':
                    return redirect()->route('sinhvien');
            }
        } else {
            session()->flash('error', 'Email hoặc Mật khẩu không đúng');
        }
    }

    public function render()
    {
        return view('livewire.auth.login-component')->layouts('livewire.auth.base');
    }
}
