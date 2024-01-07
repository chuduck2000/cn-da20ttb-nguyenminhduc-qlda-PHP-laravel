<?php

namespace App\Http\Controllers;

use App\Models\Namhoc;
use Illuminate\Http\Request;

class NamhocController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Namhoc::getRecord();
        $data['header_title'] = "danh sách năm học";
        return view('admin.namhoc.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "thêm lớp mới";
        return view('admin.namhoc.add', $data);
    }
    public function edit($id)
    {
        $data['getRecord'] = Namhoc::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Sửa";
            return view('admin.namhoc.edit', $data);
        } else {
            abort(404);
        }
    }

    public function insert(Request $request)
    {
        $save = new Namhoc;
        $save->name = $request->name;
        $save->save();

        return redirect('admin/namhoc/list')->with('success', "Thêm mới thành công!!!");
    }

    public function update($id, Request $request)
    {
        $save = Namhoc::getSingle($id);
        $save->name = $request->name;
        $save->save();

        return redirect('admin/namhoc/list')->with('success', "Cập nhật thành công!!!");
    }

    public function delete($id)
    {
        $save = Namhoc::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success', "Xóa thành công!!!");
    }
}
