@extends('layout')
@section('content')
        <section class="panel">
            <header class="panel-heading">
                Câp nhật danh mục và tỷ giá
            </header>
            <div class="panel-body">
                <form class="form-horizontal bucket-form" method="post" action="{{ route('CapNhatDanhMuc',['id'=>$danhmuc->ID]) }}" enctype="multipart/form-data">
                @csrf()
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tên</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="ten" value="{{ $danhmuc->Ten }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Loại</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="loai">
                                <option value="" selected disabled hidden>Chọn loại</option>
                                <option value="Kim Cương" {{ ($danhmuc->Loai == 'Kim Cương')?'selected':'' }}>Kim Cương</option>
                                <option value="Vàng" {{ ($danhmuc->Loai == 'Vàng')?'selected':'' }}>Vàng</option>
                                <option value="Bạc" {{ ($danhmuc->Loai == 'Bạc')?'selected':'' }}>Bạc</option>
                                <option value="Đá quý" {{ ($danhmuc->Loai == 'Đá quý')?'selected':'' }}>Đá quý</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mã</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input" name="ma" value="{{ $danhmuc->MaVach }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Giá nhập</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input" name="gianhap" value="{{ $danhmuc->GiaNhap }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Giá bán</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input" name="giaban" value="{{ $danhmuc->GiaBan }}" required>
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