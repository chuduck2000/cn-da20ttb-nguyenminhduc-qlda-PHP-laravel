<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GiangvienController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getGiangvien();
        $data['header_title'] = "danh sách Giảng viên";
        return view('admin.giangvien.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "thêm Giảng viên";
        return view('admin.giangvien.add', $data);
    }

    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'msgv' => 'max:50',
            'phai' => 'max:20',
            'sdt' => 'max:15',
        ]);

        $giangvien = new User;
        $giangvien->name = trim($request->name);
        $giangvien->msgv = trim($request->msgv);
        $giangvien->phai = trim($request->phai);
        $giangvien->sdt = trim($request->sdt);
        $giangvien->email = trim($request->email);
        $giangvien->password = Hash::make($request->password);
        $giangvien->user_type = 2;

        $giangvien->save();
        return redirect('admin/giangvien/list')->with('success', "Thêm mới thành công!!!");
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {

            $data['header_title'] = "Sửa";
            return view('admin.giangvien.edit', $data);
        } else {
            abort(404);
        }
    }
    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'msgv' => 'max:50',
            'phai' => 'max:20',
            'sdt' => 'max:15',
        ]);

        $giangvien = User::getSingle($id);
        $giangvien->name = trim($request->name);
        $giangvien->msgv = trim($request->msgv);
        $giangvien->phai = trim($request->phai);

        if (!empty($request->ngsinh)) {
            $giangvien->ngsinh = trim($request->ngsinh);
        }

        $giangvien->email = trim($request->email);
        if (!empty($request->password)) {
            $giangvien->password = Hash::make($request->password);
        }

        $giangvien->sdt = trim($request->sdt);
        $giangvien->save();

        return redirect('admin/giangvien/list')->with('success', "Cập nhật thành công!!!");
    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if (!empty($getRecord)) {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success', "Xóa thành công!!!");
        } else {
            abort(404);
        }
    }

    public function XemGiangvien()
    {
        $data['getRecord'] = User::getGiangvien();
        $data['header_title'] = "danh sách Giảng viên";
        return view('sinhvien.xem_giangvien', $data);
    }
}
