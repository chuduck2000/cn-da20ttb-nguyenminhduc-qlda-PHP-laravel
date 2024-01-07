<base href="/">
@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa thông tin Sinh viên</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <a href="{{ url('admin/sinhvien/list') }}" class="btn btn-primary">Xem Sinh viên</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="POST" action="">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-6"">
                                            <label>Mã số sinh viên<span style="color: red;">(*)</span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('mssv', $getRecord->mssv) }}" name="mssv" required
                                                placeholder="Mã số Sinh viên">
                                            <div style="color: red">{{ $errors->first('mssv') }}</div>
                                        </div>

                                        <div class="form-group col-md-6"">
                                            <label>Họ tên sinh viên<span style="color: red;">(*)</span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('name', $getRecord->name) }}" name="name" required
                                                placeholder="Tên Sinh viên">
                                            <div style="color: red">{{ $errors->first('name') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Lớp<span style="color: red;">(*)</span></label>
                                            <select class="form-control" name="lop_id" id="">
                                                <option value="">--Chọn lớp-- </option>
                                                @foreach ($getLop as $value)
                                                    <option
                                                        {{ old('lop_id', $getRecord->lop_id) == $value->id ? 'selected' : '' }}
                                                        value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            <div style="color: red">{{ $errors->first('lop_id') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Giới tính<span style="color: red;">(*)</span></label>
                                            <select class="form-control" name="phai" id="">
                                                <option value="">--Chọn giới tính--</option>
                                                <option {{ old('phai', $getRecord->phai) == 'Nam' ? 'selected' : '' }}
                                                    value="Nam">Nam
                                                </option>
                                                <option {{ old('phai', $getRecord->phai) == 'Nữ' ? 'selected' : '' }}
                                                    value="Nữ">Nữ
                                                </option>
                                                <option {{ old('phai', $getRecord->phai) == 'Khác' ? 'selected' : '' }}
                                                    value="Khác">Khác
                                                </option>
                                            </select>
                                            <div style="color: red">{{ $errors->first('phai') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Ngày sinh<span style="color: red;">(*)</span></label>
                                            <input type="date" class="form-control"
                                                value="{{ old('ngsinh', $getRecord->ngsinh) }}" name="ngsinh" required
                                                placeholder="Ngày/tháng/năm sinh">
                                            <div style="color: red">{{ $errors->first('ngsinh') }}</div>
                                        </div>

                                        <div class="form-group col-md-6"">
                                            <label>Số điện thoại<span style="color: red;">(*)</span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('sdt', $getRecord->sdt) }}" name="sdt" required
                                                placeholder="Số điện thoại">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Trạng thái: </label>
                                            <select class="form-control" name="trangthai">
                                                <option value="">--Tình trạng--</option>
                                                <option
                                                    {{ old('trangthai', $getRecord->trangthai) == '0' ? 'selected' : '' }}
                                                    value="0">Còn học</option>
                                                <option
                                                    {{ old('trangthai', $getRecord->trangthai) == '1' ? 'selected' : '' }}
                                                    value="1">Nghỉ học</option>
                                            </select>
                                            <div style="color: red">{{ $errors->first('trangthai') }}</div>
                                        </div>

                                        <div class="form-group col-md-12"">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{ $getRecord->email }}"
                                                name="email" required placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-12"">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="password">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
