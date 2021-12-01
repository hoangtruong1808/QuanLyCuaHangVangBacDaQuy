@extends('layout')
@section('content')
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
            </header>
            <div class="panel-body">
                <form class="form-horizontal bucket-form"  action="{{ route('CapNhatSanPham',['id'=>$sanpham->ID]) }}" method="post">
                    @csrf()
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mã sản phẩm</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{ $sanpham->MaVach}}" name="mavach" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Loại sản phẩm</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="loai">
                                <option>Chọn loại sản phẩm</option>
                                @foreach ($danhmucsanpham as $item)                         
                                <option value="{{ $item->ID }}"  {{ ($sanpham->Loai ==$item->ID)?'selected':'' }} >{{ $item->Ten }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Số lượng(chỉ)</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{ $sanpham->SoLuong }}" name="soluong" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Giá trị(%)</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{ $sanpham->GiaTri }}" name="giatri" required> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Giá nhập</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input" value="{{ $sanpham->GiaNhap }}" name="gianhap" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Giá bán</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="placeholder" value="{{ $sanpham->GiaBan }}" name="giaban" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tình trạng</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="tinhtrang">
                                <option value="1" {{ ($sanpham->TinhTrang =='1')?'selected':'' }}>Tồn tại</option>
                                <option value="0" {{ ($sanpham->TinhTrang =='0')?'selected':'' }}>Không tồn tại</option>
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