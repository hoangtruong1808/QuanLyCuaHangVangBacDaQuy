@extends('layout')
@section('content')
        <section class="panel">
            <header class="panel-heading">
                Cập nhật nhân viên
            </header>
            <div class="panel-body">
                <form class="form-horizontal bucket-form" method="POST" action="{{ route('CapNhatNhanVien', ['id'=>$nhanvien->ID]) }}" enctype="multipart/form-data">
                    @csrf()
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Họ tên</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="hoten" value="{{ $nhanvien->HoTen }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tài khoản</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="taikhoan" value="{{ $nhanvien->TaiKhoan }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mật khẩu</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="matkhau" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">CMND</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input" name="CMND" value="{{ $nhanvien->CMND }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Chức vụ</label>
                        <div class="col-sm-6">
                            <select class='form-control' name="chucvu">
                                <option {{ ($nhanvien->ChucVu == 'Nhân viên') ? 'selected' : '' }}>Nhân viên</option>
                                <option {{ ($nhanvien->ChucVu == 'Quản lý') ? 'selected' : '' }}>Quản lý</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Địa chỉ</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input" name="diachi" value="{{ $nhanvien->DiaChi }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Điện thoại</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="placeholder" name="dienthoai" value="{{ $nhanvien->DienThoai }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ảnh đại diện</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" placeholder="placeholder" name="anhdaidien">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ghi chú</label>
                        <div class="col-sm-6">
                            <textarea class='form-control' name="ghichu" value="{{ $nhanvien->GhiChu }}"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-6">
                            <button class="btn btn-primary" type="submit">Xác nhận</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </section>

@endsection