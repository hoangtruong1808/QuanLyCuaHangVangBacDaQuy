@extends('layout')
@section('content')
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
            </header>
            <div class="panel-body">
                <form class="form-horizontal bucket-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tên sản phẩm</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Khối lượng</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Loại</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tiêu chuẩn</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" required> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Giá nhập</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Giá bán</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="placeholder" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tình trạng</label>
                        <div class="col-sm-6">
                            <select class="form-control">
                                <option>Tồn tại</option>
                                <option>Không tồn tại</option>
                            </select>
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