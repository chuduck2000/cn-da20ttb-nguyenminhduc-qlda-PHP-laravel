<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class SinhvienController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getSinhvien();
        $data['header_title'] = "danh sách Sinh viên";
        return view('admin.sinhvien.list', $data);
    }

    public function add()
    {
        $data['getLop'] = Lop::getLop();
        $data['header_title'] = "thêm Sinh viên";
        return view('admin.sinhvien.add', $data);
    }

    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'mssv' => 'max:50',
            'lop_id' => 'max:11',
            'phai' => 'max:20',
            'sdt' => 'max:15',
        ]);

        $sinhvien = new User;
        $sinhvien->name = trim($request->name);
        $sinhvien->mssv = trim($request->mssv);
        $sinhvien->lop_id = trim($request->lop_id);
        $sinhvien->phai = trim($request->phai);

        if (!empty($request->ngsinh)) {
            $sinhvien->ngsinh = trim($request->ngsinh);
        }

        $sinhvien->sdt = trim($request->sdt);
        $sinhvien->trangthai = trim($request->trangthai);
        $sinhvien->email = trim($request->email);
        $sinhvien->password = Hash::make($request->password);

        $sinhvien->user_type = 3;
        $sinhvien->save();

        return redirect('admin/sinhvien/list')->with('success', "Thêm mới thành công!!!");
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['getLop'] = Lop::getLop();
            $data['header_title'] = "Sửa";
            return view('admin.sinhvien.edit', $data);
        } else {
            abort(404);
        }
    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if (!empty($getRecord)) {
            $getRecord->is_delete = 1;
            $getRecord->save();
        } else {
            abort(404);
        }

        return redirect()->back()->with('success', "Xóa thành công!!!");
    }

    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'mssv' => 'max:50',
            'lop_id' => 'max:11',
            'phai' => 'max:20',
            'sdt' => 'max:15',
        ]);

        $sinhvien = User::getSingle($id);
        $sinhvien->name = trim($request->name);
        $sinhvien->mssv = trim($request->mssv);
        $sinhvien->lop_id = trim($request->lop_id);
        $sinhvien->phai = trim($request->phai);

        if (!empty($request->ngsinh)) {
            $sinhvien->ngsinh = trim($request->ngsinh);
        }

        $sinhvien->sdt = trim($request->sdt);
        $sinhvien->trangthai = trim($request->trangthai);

        $sinhvien->email = trim($request->email);

        if (!empty($request->password)) {
            $sinhvien->password = Hash::make($request->password);
        }

        $sinhvien->save();

        return redirect('admin/sinhvien/list')->with('success', "Cập nhật thành công!!!");
    }

    public function XemSinhvien()
    {
        $data['getRecord'] = User::getSinhvien();
        $data['header_title'] = "danh sách Sinh viên";
        return view('giangvien.xem_sinhvien', $data);
    }
}
