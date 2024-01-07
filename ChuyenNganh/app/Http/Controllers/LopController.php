<?php

namespace App\Http\Controllers;

use App\Models\Lop;
use Illuminate\Http\Request;

class LopController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Lop::getRecord();
        $data['header_title'] = "danh sách lớp";
        return view('admin.lop.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "thêm lớp mới";
        return view('admin.lop.add', $data);
    }
    public function edit($id)
    {
        $data['getRecord'] = Lop::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Sửa";
            return view('admin.lop.edit', $data);
        } else {
            abort(404);
        }
    }

    public function insert(Request $request)
    {
        $save = new Lop;
        $save->name = $request->name;
        $save->trangthai = $request->trangthai;
        $save->save();

        return redirect('admin/lop/list')->with('success', "Thêm mới thành công!!!");
    }

    public function update($id, Request $request)
    {
        $save = Lop::getSingle($id);
        $save->name = $request->name;
        $save->trangthai = $request->trangthai;
        $save->save();

        return redirect('admin/lop/list')->with('success', "Cập nhật thành công!!!");
    }

    public function delete($id)
    {
        $save = Lop::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success', "Xóa thành công!!!");
    }
}
