<base href="/">
@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách Sinh viên</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <a href="{{ url('admin/sinhvien/add') }}" class="btn btn-primary">Thêm Sinh viên</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tìm Sinh viên</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label>Họ tên sinh viên:</label>
                                            <input type="text" class="form-control" value="{{ Request::get('name') }}"
                                                name="name" placeholder="Nhập thông tin:">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit" style="margin-top: 30px">Tìm
                                                kiếm</button>
                                            <a href="{{ url('admin/sinhvien/list') }}" class="btn btn-success"
                                                style="margin-top: 30px"> Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách Sinh viên</h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mã Sinh viên</th>
                                            <th>Họ tên Sinh viên</th>
                                            <th>Email</th>
                                            <th>Lớp</th>
                                            <th>Giới tính</th>
                                            <th>Ngày sinh</th>
                                            <th>Số điện thoại</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->mssv }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->lop_name }}</td>
                                                <td>{{ $value->phai }}</td>
                                                <td>
                                                    @if (!empty($value->ngsinh))
                                                        {{ date('d-m-Y', strtotime($value->ngsinh)) }}
                                                    @endif
                                                </td>
                                                <td>{{ $value->sdt }}</td>
                                                <td>{{ $value->trangthai == 0 ? 'Còn học' : 'Nghỉ học' }}</td>
                                                <td>
                                                    <a href="{{ url('admin/sinhvien/edit/' . $value->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        Sửa</a>
                                                    <a href="{{ url('admin/sinhvien/delete/' . $value->id) }}"
                                                        class="btn btn-danger btn-sm">Xóa</a>
                                                    <a href="{{ url('chat?receiver_id=' . base64_encode($value->id)) }}"
                                                        class="btn btn-success btn-sm">Nhắn tin</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div style="padding: 10px; float:right;">
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
