@extends('layout')
@section('content')
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục
            </header>
            <?php
                $message = Session::get('message');
                if($message) {
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message', null);
                }
            ?>
            <div class="panel-body">
                <form class="form-horizontal bucket-form" method="post" action="{{ route('LuuDanhMuc') }}" enctype="multipart/form-data">
                    @csrf()
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tên</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="ten" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Loại</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="loai">
                                <option value="" selected disabled hidden>Chọn loại</option>
                                <option value="Kim Cương">Kim Cương</option>
                                <option value="Vàng">Vàng</option>
                                <option value="Bạc">Bạc</option>
                                <option value="Đá quý">Đá quý</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mã</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input" name="ma" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Giá nhập</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input" name="gianhap" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Giá bán</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input" name="giaban" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div style="margin-left: 47%">
                            <button class="btn btn-primary" type="submit">Xác nhận</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </section>
@endsection