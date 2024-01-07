<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #EEE8AA">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        {{-- <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div> --}}
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        {{-- <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div> --}}
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        {{-- <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div> --}}
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ url('chat') }}" class="dropdown-item dropdown-footer">Tất cả tin nhắn</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @if (Auth::user()->user_type == 1)
        <a href="{{ url('admin') }}" class="brand-link" style="text-align: center; background-color:orange">
            <span class="brand-text font-weight-light" style="color: black"><b>TRANG CHỦ</b></span>
        </a>
    @elseif (Auth::user()->user_type == 2)
        <a href="{{ url('giangvien') }}" class="brand-link" style="text-align: center; background-color:orange">
            <span class="brand-text font-weight-light" style="color: black"><b>TRANG CHỦ</b></span>
        </a>
    @elseif (Auth::user()->user_type == 3)
        <a href="{{ url('sinhvien') }}" class="brand-link" style="text-align: center; background-color:orange">
            <span class="brand-text font-weight-light" style="color: black"><b>TRANG CHỦ</b></span>
        </a>
    @endif
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
            <div class="info">

                @if (Auth::user()->user_type == 1)
                    <div class="text-center">
                        <a href="#" class="d-block">
                            <b>{{ Auth::user()->name }}</b>
                        </a> <br>
                        <a href="#" class="d-block">
                            <i class="fas fa-solid fa-poo"> Admin</i>
                        </a>
                    </div>
                @elseif(Auth::user()->user_type == 2)
                    <div class="text-center">
                        <a href="{{ url('giangvien/view') }}" class="d-block">
                            <b>{{ Auth::user()->name }}</b>
                        </a> <br>
                        <a href="#" class="d-block">
                            <i class="fas fa-user-graduate"> Giảng viên</i>
                        </a>
                    </div>
                @else
                    <div class="text-center">
                        <a href="{{ url('sinhvien/view') }}" class="d-block">
                            <b>{{ Auth::user()->name }}</b>
                        </a> <br>
                        <a href="#" class="d-block">
                            <i class="fas fa-user"> Sinh viên</i>
                        </a>
                    </div>
                @endif

            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @if (Auth::user()->user_type == 1)
                    <li class="nav-item">
                        <a href="{{ url('admin/sinhvien/list') }}"
                            class="nav-link @if (Request::segment(2) == 'sinhvien') active @endif">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Sinh viên</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/giangvien/list') }}"
                            class="nav-link  @if (Request::segment(2) == 'giangvien') active @endif">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>Giảng viên</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/namhoc/list') }}"
                            class="nav-link  @if (Request::segment(2) == 'namhoc') active @endif">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p>Năm học</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/lop/list') }}"
                            class="nav-link  @if (Request::segment(2) == 'lop') active @endif">
                            <i class="nav-icon fas fa-school"></i>
                            <p>Lớp</p>
                        </a>
                    </li>


                    {{-- Giảng viên --}}
                @elseif (Auth::user()->user_type == 2)
                    <li class="nav-item">
                        <a href="{{ url('giangvien/doan/list') }}"
                            class="nav-link @if (Request::segment(2) == 'doan') active @endif">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Đồ án</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('giangvien/xem_sinhvien') }}"
                            class="nav-link @if (Request::segment(2) == 'xem_sinhvien') active @endif">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Sinh viên</p>
                        </a>
                    </li>


                    {{-- Sinh viên --}}
                @elseif (Auth::user()->user_type == 3)
                    <li class="nav-item">
                        <a href="{{ url('sinhvien/xem_giangvien') }}"
                            class="nav-link @if (Request::segment(2) == 'xem_giangvien') active @endif">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>Giảng viên</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('sinhvien/xem_doan') }}"
                            class="nav-link @if (Request::segment(2) == 'xem_doan') active @endif">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>Xem Đồ án</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ url('logout') }}" class="nav-link">
                        <i class="fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
