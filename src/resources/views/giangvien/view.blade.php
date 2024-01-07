<base href="/">
@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thông tin Giảng viên</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="POST" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-6"">
                                            <label>Mã số Giảng viên</label>
                                            {{-- <input type="text" class="form-control"
                                                value="{{ old('mssv', $getRecord->mssv) }}" name="mssv" required
                                                placeholder="Mã số Sinh viên"> --}}
                                            <div style="color: red">{{ old('msgv', $getRecord->msgv) }}</div>
                                        </div>

                                        <div class="form-group col-md-6"">
                                            <label>Họ tên Giảng viên</label>
                                            {{-- <input type="text" class="form-control"
                                                value="{{ old('name', $getRecord->name) }}" name="name" required
                                                placeholder="Tên Sinh viên"> --}}
                                            <div style="color: red">{{ old('name', $getRecord->name) }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Giới tính</label>
                                            {{-- <select class="form-control" name="phai" id="">
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
                                            </select> --}}
                                            <div style="color: red">{{ old('name', $getRecord->phai) }}</div>
                                        </div>

                                        <div class="form-group col-md-6"">
                                            <label>Số điện thoại<span style="color: red;">(*)</span></label>
                                            {{-- <input type="text" class="form-control"
                                                value="{{ old('sdt', $getRecord->sdt) }}" name="sdt" required
                                                placeholder="Số điện thoại"> --}}
                                            <div style="color: red">{{ old('sdt', $getRecord->sdt) }}</div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
