@extends('layout')
@section('content')
        <section class="panel">
            <header class="panel-heading">
                Thêm nhà cung cấp
            </header>
            <div class="panel-body">
                <form class="form-horizontal bucket-form"  method="post" action="{{ route('CapNhatNhaCungCap', ['id'=>$nhacungcap->ID]) }}" enctype="multipart/form-data">
                    @csrf(), 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tên nhà cung cấp</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="ten" value="{{ $nhacungcap->Ten }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Số điện thoại</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="dienthoai" value="{{ $nhacungcap->DienThoai }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ảnh đại diện</label>
                        <div class="col-sm-6">
                            <input type="file" name="anhdaidien" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ghi chú</label>
                        <div class="col-sm-6" name="ghichu">
                            <textarea class="form-control">{{ $nhacungcap->GhiChu }}</textarea>
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