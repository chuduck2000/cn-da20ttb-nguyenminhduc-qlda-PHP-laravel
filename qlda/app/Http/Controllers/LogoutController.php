<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function adminLogout(Request $request)
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function giangvienLogout(Request $request)
    {
        auth()->guard('giangvien')->logout();
        return redirect()->route('giangvien.login');
    }

    public function sinhvienLogout(Request $request)
    {
        auth()->guard('sinhvien')->logout();
        return redirect()->route('sinhvien.login');
    }
}
