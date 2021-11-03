@extends('layout')
@section('content')
        <section class="panel">
            <header class="panel-heading">
                Thêm khách hàng
            </header>
            <div class="panel-body">
                <form class="form-horizontal bucket-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Họ tên</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">CMND</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ngày sinh</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="DD/MM/YYYY" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Giới tính</label>
                        <div class="col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Nam
                                </label>
                                <label>
                                    <input type="checkbox" value="">
                                    Nữ
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Địa chỉ</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Điện thoại</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="placeholder">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ảnh đại diện</label>
                        <div class="col-sm-6">
                            //Image Dialog Picker
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