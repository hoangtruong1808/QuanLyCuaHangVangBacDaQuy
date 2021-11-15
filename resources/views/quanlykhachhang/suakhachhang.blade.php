@extends('layout')
@section('content')
        <section class="panel">
            <header class="panel-heading">
                Sửa thông tin khách hàng
            </header>
            <div class="panel-body">
                <form class="form-horizontal bucket-form" method="post" action="{{ route('CapNhatKhachHang',['id'=>$khachhang->ID]) }}" enctype="multipart/form-data">
                    @csrf()
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Họ tên</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="hoten" value="{{ $khachhang->HoTen }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">CMND</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="CMND" value="{{ $khachhang->CMND }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ngày sinh</label>
                        <div class="col-sm-6">
                            <input type="text" id="datepicker" name="ngaysinh" value="{{ $khachhang->NgaySinh }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Giới tính</label>
                        <div class="col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input type="radio" value="Nam" name="gioitinh" {{ ($khachhang->GioiTinh=='Nam') ? 'checked' : '' }}>
                                    Nam
                                </label>
                                <label>
                                    <input type="radio" value="Nữ" name="gioitinh" {{ ($khachhang->GioiTinh=='Nữ') ? 'checked' : '' }}>
                                    Nữ
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Địa chỉ</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input" name="diachi" value="{{ $khachhang->DiaChi }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Điện thoại</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="placeholder" name="dienthoai" value="{{ $khachhang->DienThoai }}" required>
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
                            <textarea class='form-control' name="ghichu" >{{ $khachhang->GhiChu }}</textarea>
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
        <script>
            $( function() {
                $( "#datepicker" ).datepicker({
                    prevText:"Tháng trước",
                    nextText:"Tháng sau",
                    dateFormat:"yy-mm-dd",
                    dayNamesMin: [ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật" ],
                    duration: "slow"
                });
            });
        </script>
@endsection