@extends('layout')
@section('content')
        <section class="panel">
            <header class="panel-heading">
                Thêm khách hàng
            </header>
            <?php
                $message = Session::get('message');
                if($message) {
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message', null);
                }
            ?>
            <div class="panel-body">
                <form class="form-horizontal bucket-form" method="post" action="{{ route('LuuKhachHang') }}" enctype="multipart/form-data">
                    @csrf()
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Họ tên</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="hoten" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">CMND</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="CMND" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ngày sinh</label>
                        <div class="col-sm-6">
                            <input type="text" id="datepicker" name="ngaysinh" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Giới tính</label>
                        <div class="col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input type="radio" value="Nam" name="gioitinh">
                                    Nam
                                </label>
                                <label>
                                    <input type="radio" value="Nữ" name="gioitinh">
                                    Nữ
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Địa chỉ</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input" name="diachi" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Điện thoại</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="placeholder" name="dienthoai"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ảnh đại diện</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" placeholder="placeholder" name="anhdaidien" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ghi chú</label>
                        <div class="col-sm-6">
                            <textarea class='form-control' name="ghichu" ></textarea>
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