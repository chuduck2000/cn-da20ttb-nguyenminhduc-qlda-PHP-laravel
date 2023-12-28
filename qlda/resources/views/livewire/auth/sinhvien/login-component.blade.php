@section('title')
    Sinh viên
@endsection
<div>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h5><strong>ĐĂNG NHẬP</strong></h5>
                </div>
                <div class="card-body">
                    @if (session()->has('error'))
                        <div class="arlert arlert-danger text-center">{{ session('error') }}</div>
                    @endif
                    @if (session()->has('error'))
                        <div class="arlert arlert-success text-center">{{ session('succes') }}</div>
                    @endif
                    <form wire:submit.prevent='adminLogin'>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email:</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" wire:model='email'>
                            @error('email')
                                <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1">Mật khẩu</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                wire:model='password'>
                            @error('password')
                                <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
