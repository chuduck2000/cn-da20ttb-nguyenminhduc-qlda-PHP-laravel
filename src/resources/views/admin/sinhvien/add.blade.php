<base href="/">
@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm Sinh viên</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <a href="{{ url('admin/sinhvien/list') }}" class="btn btn-primary">Xem Sinh viên</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="POST" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Mã số sinh viên<span style="color: red;">(*)</span></label>
                                            <input type="text" class="form-control" value="{{ old('mssv') }}"
                                                name="mssv" required placeholder="Nhập Mã số sinh viên">
                                            <div style="color: red">{{ $errors->first('mssv') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Họ tên sinh viên<span style="color: red;">(*)</span></label>
                                            <input type="text" class="form-control" value="{{ old('name') }}"
                                                name="name" required placeholder="Nhập họ tên Sinh viên">
                                            <div style="color: red">{{ $errors->first('name') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Lớp<span style="color: red;">(*)</span></label>
                                            <select class="form-control" name="lop_id">
                                                <option value="">--Chọn lớp-- </option>
                                                @foreach ($getLop as $value)
                                                    <option {{ old('lop_id') == '$value->id ' ? 'selected' : '' }}
                                                        value="{{ $value->id }}">
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            <div style="color: red">{{ $errors->first('lop_id') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Giới tính<span style="color: red;">(*)</span></label>
                                            <select class="form-control" name="phai" id="">
                                                <option value="">--Chọn giới tính--</option>
                                                <option {{ old('phai') == 'Nam' ? 'selected' : '' }} value="Nam">Nam
                                                </option>
                                                <option {{ old('phai') == 'Nữ' ? 'selected' : '' }} value="Nữ">Nữ
                                                </option>
                                                <option {{ old('phai') == 'Khác' ? 'selected' : '' }} value="Khác">Khác
                                                </option>
                                            </select>
                                            <div style="color: red">{{ $errors->first('phai') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Ngày/tháng/năm sinh <span style="color: red;">(*)</span></label>
                                            <input type="date" class="form-control" value="{{ old('ngsinh') }}"
                                                name="ngsinh" required>
                                            <div style="color: red">{{ $errors->first('ngsinh') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Số điện thoại</label>
                                            <input type="text" class="form-control" value="{{ old('sdt') }}"
                                                name="sdt" placeholder="Nhập số điện thoại:">
                                        </div>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Trạng thái: </label>
                                        <select class="form-control" name="trangthai">
                                            <option value="">--Tình trạng--</option>
                                            <option value="0">Còn học</option>
                                            <option value="1">Nghỉ học</option>
                                        </select>
                                        <div style="color: red">{{ $errors->first('trangthai') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email Sinh viên<span style="color: red;">(*)</span></label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" placeholder="Email:" required>
                                        <div style="color: red">{{ $errors->first('email') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password<span style="color: red;">(*)</span></label>
                                        <input type="password" class="form-control" name="password" placeholder="Password:"
                                            required>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
