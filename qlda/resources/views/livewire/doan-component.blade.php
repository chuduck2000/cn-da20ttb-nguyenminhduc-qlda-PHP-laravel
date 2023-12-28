@section('title')
    Đồ án
@endsection


<div>
    <div class="container-scroller">
        <div>
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center "
                    style="background-color: orange">
                    <a class="navbar-brand brand-logo" href="{{ route('giangvien.dashboard') }}">TRANG CHỦ</a>
                    <a class="navbar-brand brand-logo-mini" href="{{ route('giangvien.dashboard') }}">TVU</a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <div>
                            <a class="dropdown-item" href="{{ route('giangvien.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                    <path fill-rule="evenodd"
                                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg>
                            </a>
                            <form id="logout-form" style="display: none;" method="POST"
                                action="{{ route('giangvien.logout') }}">
                                @csrf
                            </form>
                        </div>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>

            <div class="container-fluid page-body-wrapper">
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item nav-profile">
                            <a href="#" class="nav-link">

                                <div class="nav-profile-text d-flex flex-column">
                                    {{-- <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span> --}}
                                    <span class="text-secondary text-small">Giảng viên</span>
                                </div>
                                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="menu-title">Đồ án</span>
                                <i class="mdi mdi-book menu-icon"></i>
                            </a>
                        </li>
                    </ul>
                </nav>

                {{-- Nội dung lớn --}}
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="Page-header"
                            style="display: flex; justify-content: space-between; align-items: center;">
                            <h5 class="Page-title">Danh sách đồ án</h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#addDoanModal">Thêm đồ án</a>
                                    </li>
                                </ol>
                            </nav>

                        </div>

                        <div class="card-body">
                            @if (session()->has('message'))
                                <div class="alert alert-success text-center">{{ session('message') }}</div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="addDoanModal" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm đồ án</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container-fluid">
                        <form wire:submit.prevent="storeDoanData">
                            <div class="form-group row">
                                <label for="doan_id" class="col-3">Mã đồ án: </label>
                                <div class="col-9">
                                    <input type="text" id="doan_id" class="form-control" wire:model="doan_id">
                                    @error('doan_id')
                                        <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-3">Tên đồ án: </label>
                                <div class="col-9">
                                    <input type="text" id="name" class="form-control" wire:model="name">
                                    @error('name')
                                        <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type_id" class="col-3">Loại đồ án: </label>
                                <div class="col-9">
                                    <input type="text" id="type_id" class="form-control" wire:model="type_id">
                                    @error('type_id')
                                        <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namhoc_id" class="col-3">Năm đồ án: </label>
                                <div class="col-9">
                                    <input type="text" id="namhoc_id" class="form-control"
                                        wire:model="namhoc_id">
                                    @error('namhoc_id')
                                        <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="doan_id" class="col-3"></label>
                                <div class="col-9">
                                    <button type="submit" class="btn btn-sm btn-primary">Thêm đồ án</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM

        });
    </script>
</div>
