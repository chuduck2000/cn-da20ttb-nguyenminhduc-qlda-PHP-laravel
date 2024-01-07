<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function view()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "Xem thông tin";
        if (Auth::user()->user_type == 2) {
            return view('giangvien.view', $data);
        } else if (Auth::user()->user_type == 3) {
            return view('sinhvien.view', $data);
        }
    }
}
