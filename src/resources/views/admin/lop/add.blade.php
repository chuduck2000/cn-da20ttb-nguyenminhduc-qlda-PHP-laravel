<base href="/">
@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm lớp mới</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <a href="{{ url('admin/lop/list') }}" class="btn btn-primary">Xem lớp</a>
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
                                        <label>Tên lớp: </label>
                                        <input type="text" class="form-control" name="name" required
                                            placeholder="Nhập tên lớp:">
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái: </label>
                                        <select class="form-control" name="trangthai">
                                            <option value="0">Hoạt động</option>
                                            <option value="1">Không hoạt động</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
