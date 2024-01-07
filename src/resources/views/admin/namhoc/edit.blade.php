<base href="/">
@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa thông tin Năm học</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <a href="{{ url('admin/namhoc/list') }}" class="btn btn-primary">Xem Năm học</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="post" action="">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $getRecord->name }}"
                                            name="name" required placeholder="Tên Năm học">
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
