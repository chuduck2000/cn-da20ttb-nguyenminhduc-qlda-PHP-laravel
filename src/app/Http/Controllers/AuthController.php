<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin');
            } elseif (Auth::user()->user_type == 2) {
                return redirect('giangvien');
            } elseif (Auth::user()->user_type == 3) {
                return redirect('sinhvien');
            }
        }
        return view('auth.login');
    }
    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin');
            } elseif (Auth::user()->user_type == 2) {
                return redirect('giangvien');
            } elseif (Auth::user()->user_type == 3) {
                return redirect('sinhvien');
            }
        } else {
            return redirect()->back()->with('error', 'Hãy nhập Email và Password');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
