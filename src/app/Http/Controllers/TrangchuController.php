<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TrangchuController extends Controller
{
    public function trangchu()
    {
        $data['header_title'] = 'trangchu';
        if (Auth::user()->user_type == 1) {
            return view('admin.trangchu', $data);
        } elseif (Auth::user()->user_type == 2) {
            return view('giangvien.trangchu', $data);
        } elseif (Auth::user()->user_type == 3) {
            return view('sinhvien.trangchu', $data);
        }
    }
}
