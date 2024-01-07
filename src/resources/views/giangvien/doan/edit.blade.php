<base href="/">
@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa đồ án</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <a href="{{ url('giangvien/doan/list') }}" class="btn btn-primary">Xem Đồ án</a>
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
                            <form method="POST" action="">
                                {{ csrf_field() }}

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên Đồ án: </label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $getRecord->name }}" required placeholder="Nhập tên đồ án:">
                                    </div>

                                    <div class="form-group">
                                        <label>Loại đồ án: </label>
                                        <select class="form-control" name="loai" required>
                                            <option value="">Chọn loại đồ án</option>
                                            <option {{ $getRecord->loai == 'Cơ sở ngành' ? 'selected' : '' }}
                                                value="Cơ sở ngành">Cơ sở ngành</option>
                                            <option {{ $getRecord->loai == 'Chuyên ngành' ? 'selected' : '' }}
                                                value="Chuyên ngành">Chuyên ngành</option>
                                            <option {{ $getRecord->loai == 'Khóa luận tốt nghiệp' ? 'selected' : '' }}
                                                value="Khóa luận tốt nghiệp">Khóa luận tốt nghiệp</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái: </label>
                                        <select class="form-control" name="trangthai">
                                            <option {{ $getRecord->trangthai == 0 ? 'selected' : '' }} value="0">Đăng
                                                ký</option>
                                            <option {{ $getRecord->trangthai == 1 ? 'selected' : '' }} value="1">Chưa
                                                đăng ký</option>
                                        </select>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label>Sinh viên thực hiện: </label>
                                        <select class="form-control" name="sv_da">
                                            <option {{ $getRecord->trangthai == 0 ? 'selected' : '' }} value="0">Đăng
                                                ký</option>
                                        </select>
                                    </div> --}}
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
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
