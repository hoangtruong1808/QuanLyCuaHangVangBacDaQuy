@extends('layout')
@section('content')
        <section class="panel">
            <header class="panel-heading">
                Thêm nhân viên
            </header>
            <div class="panel-body">
                <form class="form-horizontal bucket-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Họ tên</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tài khoản</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mật khẩu</label>
                        <div class="col-sm-6">
                            <input type="password" placeholder="DD/MM/YYYY" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">CMND</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Chức vụ</label>
                        <div class="col-sm-6">
                            <select class='form-control'>
                                <option>Nhân viên</option>
                                <option>Quản lý</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Địa chỉ</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Điện thoại</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="placeholder" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ghi chú</label>
                        <div class="col-sm-6">
                            <textarea class='form-control'></textarea>
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