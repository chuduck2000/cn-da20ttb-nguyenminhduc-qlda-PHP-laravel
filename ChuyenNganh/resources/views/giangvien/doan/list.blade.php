<base href="/">
@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách Đồ án</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <a href="{{ url('giangvien/doan/add') }}" class="btn btn-primary">Thêm Đồ án</a>
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
                                <h3 class="card-title">Tìm kiếm Đồ án</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label>Tên đồ án:</label>
                                            <input type="text" class="form-control" value="{{ Request::get('name') }}"
                                                name="name" placeholder="Tên đồ án:">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Loại đồ án:</label>
                                            <select class="form-control" name="loai">
                                                <option value="">Chọn loại đồ án</option>
                                                <option {{ Request::get('loai') == 'Cơ sở ngành' ? 'selected' : '' }}
                                                    value="Cơ sở ngành">Cơ sở ngành</option>
                                                <option {{ Request::get('loai') == 'Chuyên ngành' ? 'selected' : '' }}
                                                    value="Chuyên ngành">Chuyên ngành
                                                </option>
                                                <option {{ Request::get('loai') == 'Đồ án tốt nghiệp' ? 'selected' : '' }}
                                                    value="Khóa luận tốt nghiệp">Khóa luận
                                                    tốt nghiệp</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit" style="margin-top: 30px">Tìm
                                                kiếm</button>
                                            <a href="{{ url('giangvien/doan/list') }}" class="btn btn-success"
                                                style="margin-top: 30px"> Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách Đồ án</h3>
                            </div>

                            @include('message')

                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên đồ án</th>
                                            <th>Loại đồ án</th>
                                            <th>Trạng thái</th>
                                            <th>Tạo bởi</th>
                                            {{-- <th>Sinh viên thực hiện</th> --}}
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->loai }}</td>
                                                <td>{{ $value->trangthai == 0 ? 'Đăng ký' : 'Chưa đăng ký' }}</td>
                                                <td>{{ $value->created_by }}</td>
                                                {{-- <td>{{ $value->sv_da }}</td> --}}
                                                <td>
                                                    <a href="{{ url('giangvien/doan/edit/' . $value->id) }}"
                                                        class="btn btn-warning">
                                                        Sửa</a>
                                                    <a href="{{ url('giangvien/doan/delete/' . $value->id) }}"
                                                        class="btn btn-danger">Xóa</a>
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
