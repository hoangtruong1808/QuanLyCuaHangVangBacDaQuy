@extends('detail')

@section('heading')
Chi tiết khách hàng 
@endsection

@section('assets-name')
{{ $data->HoTen }}
@endsection

@section('content_summary_asset')
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Họ tên</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->HoTen }}">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Số CMND</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->CMND}}">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Ngày sinh</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->NgaySinh}}">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Giới tính</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->GioiTinh}}">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Địa chỉ</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->DiaChi}}">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Điện thoại</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->DienThoai }}">
            </div>
        </div>
    </li>
    @endsection
    @section('content_detail')
    <table class="table stats-table tbl-detail">
        <thead>
            <tr>
                <th colspan='6' style="text-align: center; font-size: 18px; color:#696969">Lịch sử giao dịch</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt=1 ?>
            <th colspan='6' style="text-align:center">Lịch sử bán hàng</th>
            <tr>
                <th style="text-align:center">STT</th>
                <th style="text-align:center">Mã sản phẩm</th>
                <th style="text-align:center">Ngày giao dịch</th>
                <th style="text-align:center">Số lượng(chỉ)</th>
                <th style="text-align:center">Đơn giá(VNĐ)</th>  
                <th style="text-align:center">Thành tiền(VNĐ)</th>
            </tr>
            @foreach ($sanphamban as $sanphamban)
            <tr>
                <td style="text-align:center">{{ $stt++ }}</td>
                <td style="text-align:center">{{ $sanphamban->MaSanPham }}</td>
                <td style="text-align:center">{{ $sanphamban->NgayLapPhieu }}</td>
                <td style="text-align:center">{{ $sanphamban->SoLuong}}</td>
                <td style="text-align:center">{{ number_format($sanphamban->DonGia)}}</td>
                <td style="text-align:center">{{ number_format($sanphamban->ThanhTien)}}</td>
            </tr>
            @endforeach
        </tbody>
        <tbody>
            <?php $stt=1 ?>
            <th colspan='7' style="text-align:center">Lịch sử mua hàng</th>
            <tr>
                <th style="text-align:center">STT</th>
                <th style="text-align:center">Loại sản phẩm</th>
                <th style="text-align:center">Ngày giao dịch</th>
                <th style="text-align:center">Số lượng</th>
                <th style="text-align:center">Đơn giá</th>
                <th style="text-align:center">Phần trăm</th>    
                <th style="text-align:center">Thành tiền</th>
            </tr>
            @foreach ($sanphammua as $sanphammua)
            <tr>
                <td style="text-align:center">{{ $stt++ }}</td>
                <td style="text-align:center">{{ $sanphammua->LoaiSanPham }}</td>
                <td style="text-align:center">{{ $sanphammua->NgayLapPhieu }}</td>
                <td style="text-align:center">{{ $sanphammua->SoLuong}}</td>
                <td style="text-align:center">{{ number_format($sanphammua->DonGia)}}</td>
                <td style="text-align:center">{{ number_format($sanphammua->PhanTram)}}</td>
                <td style="text-align:center">{{ number_format($sanphammua->ThanhTien)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

