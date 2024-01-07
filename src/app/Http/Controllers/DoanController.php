<?php

namespace App\Http\Controllers;

use App\Models\Doan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoanController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Doan::getRecord();
        $data['header_title'] = "danh sách Đồ án";
        return view('giangvien.doan.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "thêm Đồ án mới";
        return view('giangvien.doan.add', $data);
    }

    public function insert(Request $request)
    {
        $save = new Doan;
        $save->name = trim($request->name);
        $save->trangthai = trim($request->trangthai);
        $save->loai = trim($request->loai);
        $save->created_by = Auth::user()->id;
        $save->save();

        return redirect('giangvien/doan/list')->with('success', "Thêm mới thành công!!!");
    }

    public function edit($id)
    {
        $data['getRecord'] = Doan::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Sửa";
            return view('giangvien.doan.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $save = Doan::getSingle($id);
        $save->name = trim($request->name);
        $save->trangthai = trim($request->trangthai);
        $save->loai = trim($request->loai);
        $save->save();

        return redirect('giangvien/doan/list')->with('success', "Cập nhật thành công!!!");
    }

    public function delete($id)
    {
        $save = Doan::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success', "Xóa thành công!!!");
    }

    public function xemDoan()
    {
        $data['getRecord'] = Doan::getRecord();
        $data['header_title'] = "danh sách Đồ án";
        return view('sinhvien.xem_doan', $data);
    }
}
